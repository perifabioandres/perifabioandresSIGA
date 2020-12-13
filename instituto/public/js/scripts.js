$(document).ready(function(){

    // obtengo las zonas iniciales
    if ($('select[name="pais_id"]').size()) {
        getZonas();
    }

    // cambia el pais, actualizo todo
    $('select[name="pais_id"]').on('change', function (){
        getZonas();
    });

    // cambio la provincia, actualizo los departamentos y las localidadess
    $('select[name="provincia_id"]').on('change', function (){
        setTimeout(function(){
            getZona('departamentos','provincia_id', 'departamento_id'); // departamentos de una provincia
            
            setTimeout(function(){
                getZona('localidades','departamento_id', 'localidad_id'); // localidades de una provincia

                setTimeout(function(){
                    getZona('municipios','localidad_id', 'municipio_id'); // municipios de una localidad
        
                }, 500);

            }, 350);

        }, 200);        
    });

    // cambio el departamento, actualizo la localidad
    $('select[name="departamento_id"]').on('change', function (){

            setTimeout(function(){
                getZona('localidades','departamento_id', 'localidad_id'); // localidades de una provincia

                setTimeout(function(){
                    getZona('municipios','localidad_id', 'municipio_id'); // municipios de una localidad
        
                }, 350);

            }, 200);

    });




/*
    // Funcion provincias
    $("#pais_id").change(function(){ //select las provincias segun el pais

        // console.log(pais_id);
        var pais_id = $(this).val();

        //reinicio el select de departamento cuando cambia el pais
        $('#departamento_id').find('option').remove().end().append('<option value="whatever">Seleccione el departamento</option>').val('whatever');
        //reinicio el select de localiad cuando cambia el pais
        $('#localidad_id').find('option').remove().end().append('<option value="whatever">Seleccione la localidad</option>').val('whatever');
       
        // obtengo las provincias
        $.get('getprovincia/'+pais_id, function(data){

            // console.log(data);
            var provincia_id = '<option value="">Seleccione la provincia</option>';

            for (var i=0; i<data.length; i++)
                provincia_id+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            $("#provincia_id").html(provincia_id);

        });

    });

    //Funcion departamento ...

    $("#provincia_id").change(function(){//carga los departamentos segun la provincia seleccionada

        var provincia_id = $(this).val();

        // obtengo los departamentos
        $.get('getdepartamento/'+provincia_id, function(data){

            //console.log(data);
            var departamento_id = '<option value="">Seleccione el departamento</option>';

            for (var i=0; i<data.length; i++)
                departamento_id+='<option value="'+data[i].id+'">'+data[i].NombreDep+'</option>';
            $("#departamento_id").html(departamento_id);

        });
     

    });


    //Funcion localidades ...

    $("#departamento_id").change(function(){//carga los departamentos segun la provincia seleccionada
    
        var departamento_id = $(this).val();

        // obtengo los departamentos
        $.get('getlocalidad/'+departamento_id, function(data){

            //console.log(data);
            var localidad_id = '<option value="">Seleccione la localidad</option>';

            for (var i=0; i<data.length; i++)
                localidad_id+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            $("#localidad_id").html(localidad_id);

        });

    });

*/      //otras funciones ...


//Scrip para que cambie los años de estudio segun la oferta uso en la pantalla 
//Organizacion de cursada-->
//<script type="text/javascript">
    // $(document).ready(function(){

    // Funcion titulacion
        $("#ofeyouy_id").change(function(){ //select de las titulaciones segun la oferta

            // console.log(oferta_id);
            var oferta_id = $(this).val();

            // obtengo las provincias
            $.get('getcurso/'+oferta_id, function(data){

                // console.log(data);
                var curso_id = '<option value="">Seleccione el curso</option>';

                for (var i=0; i<data.length; i++)
                    curso_id+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                $("#curso_id").html(curso_id);

            });

            });
    // });

//</script>






});



//  ejecuto la funcion de obtener las zonas en forma encadenadas
function getZonas() {
    
    // obtengo las zonas geograficas
    setTimeout(function(){
        getZona('provincias','pais_id', 'provincia_id'); // provincias de un pais
        
        setTimeout(function(){
            getZona('departamentos','provincia_id', 'departamento_id'); // departamentos de una provincia
            
            setTimeout(function(){
                getZona('localidades','departamento_id', 'localidad_id'); // localidades de una provincia
        
                setTimeout(function(){
                    getZona('municipios','localidad_id', 'municipio_id'); // municipios de una localidad
        
                }, 800);

            }, 600);

        }, 400);

    }, 200);

}

// obtengo las zonas de un padre
function getZona(model, parent_id, children_id){

    if ($('select[name="'+parent_id+'"]').size() && $('select[name="'+children_id+'"]').size()) {

        var data  = new FormData();
        data.append('_token', $("input[name='_token']").val()); // append token
        data.append('model', model);                                // append val
        data.append('id', $('select[name="'+parent_id+'"]').val());                                // append val
        
        $.ajax({                                                // send ajax
            url: "/get/zona",
            type: "POST",
            data: data,
            // enctype: 'multipart/form-data',
            processData: false,                             // tell jQuery not to process the data
            contentType: false                              // tell jQuery not to set contentType
        }).done(function(response) {

            // vacio el select
            $('select[name="'+children_id+'"]').empty();

            // agrego la opcion -- TODOS -- para utilizarlo en las busquedas
            if($('select[name="'+children_id+'"]').attr('mode') && $('select[name="'+children_id+'"]').attr('mode') == 'search' ){
               
                $('select[name="'+children_id+'"]').append($('<option>', { 
                    value: '0',
                    text : '-- TODOS --' 
                })); 
        
            }

            if (response != '') {
                
                // lleno el select
                $.each( response, function( i, item) {
                    $('select[name="'+children_id+'"]').append($('<option>', { 
                        value: item.id > 0 ? item.id : '',
                        text : item.nombre 
                    }));
                });

                // valor por defecto en caso de edit
                if ($('input[name="old_'+children_id+'"]').val() != ''){
                    $('select[name="'+children_id+'"]').val($('input[name="old_'+children_id+'"]').val());
                    $('input[name="old_'+children_id+'"]').val('');
                }

                $('select[name="'+parent_id+'"]').prop('disabled', false);
                $('select[name="'+children_id+'"]').prop('disabled', false);

            }else{

                // solo para los formualrios distinto al search
                if($('select[name="'+children_id+'"]').attr('mode') != 'search'){

                    // muestro el item vacio
                    $('select[name="'+children_id+'"]').append($('<option>', { 
                        value: '',
                        text : '-- NO EXISTEN REGISTROS --' 
                    }));
                
                }
            }

        });
    }

}