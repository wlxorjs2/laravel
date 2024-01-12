document.querySelectorAll('.input100').forEach(function(input) {
    input.addEventListener('input', function() {
        if (this.value) {
            this.classList.add('has-val');
        } else {
            this.classList.remove('has-val');
        }
    });
    
    if (input.value) {
        input.classList.add('has-val');
    }
});