"use strict";

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

    bCalc(display, result){
        try{
            var valorAux = eval(display.value);
        }catch(err){
            var valorAux = err;
        }
        result.value = "="+valorAux;
        display.value = valorAux;
    }
}
class ScientificCalculator extends Calculator {
  constructor(){
    super();
    this.scientificOperations = new Map();
    this.scientificConstants = new Map();
    this.loadscientificOperations();
    this.loadConstants();
    this.addConstant = (input, c) => this.addToDisplay(input, eval(this.scientificConstants.get(c)));

  }

  sCalc(display, result, o){
      try {
          display.value = eval(this.scientificOperations.get(o)(display.value));
      }catch(err){
          display.value = err;
      }
      result.value = "="+display.value;
  }

  loadscientificOperations(){
    this.scientificOperations.set("sin", (a) => Math.sin(a));
    this.scientificOperations.set("cos", (a) => Math.cos(a));
    this.scientificOperations.set("tan", (a) => Math.tan(a));
    this.scientificOperations.set("sinh", (a) => Math.sinh(a));
    this.scientificOperations.set("cosh", (a) => Math.cosh(a));
    this.scientificOperations.set("tanh", (a) => Math.tanh(a));
    this.scientificOperations.set("x^2", (a) => Math.pow(a, 2));
    this.scientificOperations.set("x^3", (a) => Math.pow(a, 3));
    this.scientificOperations.set("x^y", (a,b) => Math.pow(a,b));
    this.scientificOperations.set("e^x", (a) => Math.exp(a));
    this.scientificOperations.set("n!", (a) => Math.factorial(a));
    this.scientificOperations.set("sqrt", (a) => Math.sqrt(a));
    this.scientificOperations.set("log", (a) => Math.log(a));
    this.scientificOperations.set("log2", (a) => Math.log2(a));
    this.scientificOperations.set("log10", (a) => Math.log10(a));
    this.scientificOperations.set("e^x", (a) => Math.pow(Math.E, a));


      //Solo por experimentar un poco mas con JS:
      //De esta forma se pueden cargar los dos arrays, nombre y funcion, y mediante un map añadirlos al Diccionario
          //var names = ["sin","cos","tan"];
          //var mathFunctions = [(a) => Math.sin(a), (a) => Math.cos(a), (a) => Math.tan(a)];
          //names.map((e,i) => this.scientificOperations.set(names[i], mathFunctions[i]));
  }

  loadConstants(){
    this.scientificConstants.set("pi", Math.PI);
    this.scientificConstants.set("e", Math.E);
  }

}

var calc = new ScientificCalculator();
