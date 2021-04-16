let telefono = document.getElementById('telefono');

telefono.addEventListener('input',function(){
    console.log('telefono')
    if(this.value.length >8){
        this.value = this.value.slice(0,8);
    }
})