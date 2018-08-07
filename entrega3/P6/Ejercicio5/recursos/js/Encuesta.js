"use strict";

class PersonalDataValidator {
    constructor(){}

    isAValidName(){
        return document.getElementById('name').value.length >= 3 && document.getElementById('name').value.length <= 15;
    }

    isAValidSurname(){
        return document.getElementById('surname').value.length >= 3 && document.getElementById('surname').value.length <= 50;
    }

    isAValidAge(){
        return document.getElementById('age').value >= 3 && document.getElementById('age').value <= 110 && !isNaN(document.getElementById('age').value);
    }

    isValidEmail(){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        return reg.test(document.getElementById("mail").value);
    }

}

class PollValidator {
    constructor(){}

    isValidQuestion1(){
        //Es obligatoria
        return document.getElementById('Pregunta1_opt1').checked || document.getElementById('Pregunta1_opt2').checked;
    }

    isValidQuestion2(){
        if(document.getElementById('Pregunta1_opt1').checked) {
            for (var i = 1; i < 7; i++) {
                if (document.getElementById('Pregunta2_resp' + i).checked) {
                    return true;
                }
            }
            return false;
        }else{
            return true;
        }
    }

    isAnyCheckChecked() {
        if (!document.getElementById('Pregunta1_opt1').checked) {
            for(var i=1; i<7; i++){
                if(document.getElementById('Pregunta2_resp'+i).checked){
                    return true;
                }
            }
        }
        return false;
    }

    isValidQuestion5(){
        return document.getElementById('pregunta5').value.length >= 10 && document.getElementById('pregunta5').value.length <= 500;
    }
}

class DataValidator {

    constructor(){
        this.personalData = new PersonalDataValidator();
        this.pollData = new PollValidator();
        this.errors = "Errores encontrados: \n";
    }

    arePersonalDataValid(){
        var flag = true;

        if(!this.personalData.isAValidName()){
            this.errors += "El nombre no es válido, recuerde que el nombre debe contener entre 3 y 15 carácteres.\n";
            document.getElementById("name").style.borderColor = "red";
            flag=false;
        }

        if(!this.personalData.isAValidSurname()){
            this.errors += "Los apellidos no son válidos, recuerde que los apellidos deben contener entre 3 y 50 carácteres.\n";
            document.getElementById("surname").style.borderColor = "red";
            flag=false;
        }

        if(!this.personalData.isAValidAge()){
            this.errors += "La edad no es válida, asegurese de haber introducido un número y recuerde que la edad debe estar comprendida entre 3 y 110 años.\n";
            document.getElementById("age").style.borderColor = "red";
            flag=false;
        }

        if(!this.personalData.isValidEmail()){
            this.errors += "El email no es válido, asegurese de haberlo escrito correctamente.\n";
            document.getElementById("mail").style.borderColor = "red";
            flag=false;
        }

        return flag;
    }

    areQuestionsValid(){
        var flag = true;

        if(!this.pollData.isValidQuestion1()){
            this.errors += "Asegurese de haber marcado una de las dos opciones en la pregunta 1.\n";
            flag = false;
        }

        if(!this.pollData.isValidQuestion2()){
            this.errors += "Asegurese de haber marcado alguna de las casillas en la pregunta 2.\n";
            flag = false;
        }

        if(this.pollData.isAnyCheckChecked()){
            this.errors += "Asegurese de NO haber marcado alguna de las casillas en la pregunta 2 NO ha usado una calculadora antes.\n";
            flag = false;
        }

        if(!this.pollData.isValidQuestion5()){
            this.errors += "Asegurese de que el texto contiene más de 10 letras y menos de 500\n";
            document.getElementById("pregunta5").style.borderColor = "red";
            flag = false;
        }

        return flag;
    }

    isAllValid(){
        var pred1=this.arePersonalDataValid();
        var pred2=this.areQuestionsValid();
        return pred1 && pred2;
    }

    getErrors(){
        return this.errors;
    }

    resetErrors(){
        this.errors = "";
    }
}

class Sender {
    constructor(){
        this.dataValidator = new DataValidator();
        this.average = 0;
    }

    getResultsFromQuestion1(){
        if(document.getElementById('Pregunta1_opt1').checked)
            return document.getElementById('Pregunta1_opt1').value;
        else
            return document.getElementById('Pregunta1_opt2').value;
    }

    getResultsFromQuestion2(){
        var resultChecks = [];
        for(var i=0; i<6; i++){
            if(document.getElementById('Pregunta2_resp'+(i+1)).checked)
                resultChecks.push(document.getElementById('Pregunta2_resp'+(i+1)).value);

        }
        return resultChecks;
    }

    sendEmail(){
        if(!this.dataValidator.isAllValid())
            alert(this.dataValidator.getErrors());
        else {
            var subject = "[Resultado Encuesta] Calculadora científica";

            var body = "Datos del participante: %0D%0A";
            body += "Nombre: " + document.getElementById('name').value + "%0D%0A";
            body += "Apellidos: " + document.getElementById('surname').value + "%0D%0A";
            body += "Edad: " + document.getElementById('age').value + "%0D%0A";
            body += "Sexo: " + document.getElementById('gender').value + "%0D%0A";
            body += "Email:" + document.getElementById('mail').value + "%0D%0A";

            body += "Resultados de la encuesta:%0D%0A";
            body += document.getElementById('pregunta1').innerText + "%0D%0A";
            body += "Respuesta: " + this.getResultsFromQuestion1() + "%0D%0A"; //

            body += document.getElementById('pregunta2').innerText + "%0D%0A";
            this.getResultsFromQuestion2().forEach((e) => body += "Respuesta: " + e + "%0D%0A");


            body += document.getElementById('pregunta3').innerText + "%0D%0A";
            body += "Respuesta: " + document.getElementById('opcionesPregunta3').options[document.getElementById('opcionesPregunta3').selectedIndex].text + " , con valor: " + document.getElementById('opcionesPregunta3').options[document.getElementById('opcionesPregunta3').selectedIndex].value + "%0D%0A"; //

            body += document.getElementById('pregunta4').innerText + "%0D%0A";
            body += "Respuesta: " + document.getElementById('opcionesPregunta4').options[document.getElementById('opcionesPregunta4').selectedIndex].text + " , con valor: " + document.getElementById('opcionesPregunta4').options[document.getElementById('opcionesPregunta4').selectedIndex].value + "%0D%0A"; //

            body += "5. Sugerencias:" + "%0D%0A";
            body += "Respuesta: " + document.getElementById('pregunta5').value + "%0D%0A"; //


            this.average = parseInt(document.getElementById('opcionesPregunta3').options[document.getElementById('opcionesPregunta3').selectedIndex].value);
            this.average += parseInt(document.getElementById('opcionesPregunta4').options[document.getElementById('opcionesPregunta4').selectedIndex].value);
            this.average = this.average/2;
            body += "EVALUACIÓN: Nota media de :" + this.average;


            return window.open('mailto:uo246305@uniovi.es?subject=' + subject + '&body=' + body);
        }
        this.dataValidator.resetErrors();
    }
}

var s = new Sender();