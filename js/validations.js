var pattern_rfc=/^[a-zA-Z]{4}(\d{6})(([a-zA-Z0-9]){3})?$/;


//arrow function
let valida_curriculum = () =>{
    let js_nom=document.getElementById("f_nom").value.trim();
    let js_ape=document.getElementById("f_ape").value.trim();
    let js_con=document.getElementById("f_pwd").value.trim();
    let js_rfc=document.getElementById("f_rfc").value.trim();
   
    let js_gen=document.getElementsByName("f_gen");
    // create a variable to track whether a radio button has been selected
    let radioSelected = false;

    // loop through each radio button
    for (let i = 0; i < js_gen.length; i++) {
    // check if the radio button is checked
    if (js_gen[i].checked) {
      // set the variable to true if a radio button is checked
      radioSelected = true;
      // break the loop if a radio button is checked
      break;
    }
  }

  let archivo =document.getElementById('f_curri').value;
  let js_interes=document.getElementById("areade").value;
    
    if (js_nom.length == 0){
        //alert("Error:El nombre no puede ir vació");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:El nombre no puede ir vació!'
            
          });
        return false;
    }
    else if (js_ape.length==0){
        //alert("Error:El apellido no puede ir vació");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:El apellido no puede ir vació!'
          });
        return false;
    }
    else if (js_con.length==0){
        //alert("Error:La Contraseña no puede ir vació");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:La Contraseña no puede ir vació'
          });
        return false;
    }
    else if (js_con.length<6 || js_con.length>12){
        //alert("Error:la contraseña debe tener entre 6 y 12 chars");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:la contraseña debe tener entre 6 y 12 chars'
          });
        return false;
    }
    else if (js_rfc.length==0){
        //alert("Error:El RFC no puede ir vació");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:El RFC no puede ir vació'
          });
        return false;
    }
    else if (!pattern_rfc.test(js_rfc)){
        //alert('El dato RFC no cumple el formato! ejemplo:PETD741512R45');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El dato RFC no cumple el formato! ejemplo:PETD741512R45'
          });
        return false;
    }
    else if (!radioSelected){
        //alert('Seleccione el Genero');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione el Genero'
          });
        return false;
    }
    else if (archivo.length==0){
        //alert("Error:Debe cargar su curriculum");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:Debe cargar su curriculum'
          });
        return false;
    }   
    else if (js_interes==0){
        //alert("Error:Debe Seleccionar un área de interes");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Error:Debe Seleccionar un área de interes'
          });
        return false;
    }       
}


function valida_curriculum2(){
    var js_nom=document.getElementById("f_nom").value.trim();

}