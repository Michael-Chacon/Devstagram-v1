import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen', 
    acceptedFiles: ".png,.jpg,.jpeg,.gif", 
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo', 
    maxFiles: 1, 
    uploadMultiple: false,

    
    init: function(){
        // recuperar solo la imagen cuando falla el registro de información
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            
            imagenPublicada.previewElement.classList.add('dz-success', 'dz.complete');
        }
    }

});

// obtener la imagen seleccionanda y pasarla al formulario para registrarla en la DB
dropzone.on("success", function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
});

// vaciar el input de imagen en el formulario que registra los datos en la DB cuando se borra la imagen en el campo original.
dropzone.on("removedfile", function(){
    document.querySelector('[name="imagen"]').value = "";
});