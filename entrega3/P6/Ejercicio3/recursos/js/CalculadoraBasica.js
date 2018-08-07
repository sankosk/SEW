/*
Author: Esteban Montes Morales - UO246305
Subject: SEW ~ P6-Ecmascript-Ejercicio3
Description:
  - Simple calculator made using arrow functions and approaching the <<eval>> function
*/

"use strict";
class Calculator {
    constructor(){
        this.memory = 0;
        this.addToDisplay = (input, c) => (input.value == null || input.value == "0")  ? input.value = c : input.value += c;
        this.removeFromDisplay = (input) => input.value = input.value.substring(1, input.value.length);
        this.getFromMemory = (input) => input.value = this.memory;
        this.incMemory = (input) => (this.memory == 0) ? this.memory=input.value : this.memory++;
        this.decMemory = () => (this.memory == 0) ? this.memory: this.memory--;
    }

    resetDisplays(display, result){
        display.value = 0;
        result.value = null;
    }

    calc(display, result){
        try{
            var valorAux = eval(display.value);
        }catch(err){
            var valorAux = err;
        }
        result.value = "="+valorAux;
        display.value = valorAux;
    }
}

var calc = new Calculator();