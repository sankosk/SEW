"use strict";
class Participant {

    constructor(){}

    generateHTML(){
        var genders = ["Male", "Female", "Other", "Rather not say"];
        var beginHTML = `
            <form id="datosParticipante">
                <div>
                    <label for="name">Nombre:</label>
                    <input type="text" id="name"/>
                </div>
                <div>
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname"/>
                </div>
                <div>
                    <label for="age">Age:</label>
                    <input type="text" id="age"/>
                </div>
                <div>
                    <label for="gender">gender:</label>
                    <select id="gender">
        `;

        genders.forEach((e) => beginHTML = beginHTML + "\n\t\t\t\t\t\t<option>" + e + "</option>\n");

        var endHTML = `
                    </select>
                </div>
            </form>
        `;

        beginHTML = beginHTML + endHTML;
        document.body.innerHTML += beginHTML;
    }
}


class Question {
    constructor(description, field){
        this.description = description;
        this.field = field;
    }

    generateHTML(){
    }
}

class Poll {
    constructor(participant, questions){
        this.participant = participant;
        this.questions = questions;
    }

    generateHTML(){
    }
}

var p = new Participant();
p.generateHTML();