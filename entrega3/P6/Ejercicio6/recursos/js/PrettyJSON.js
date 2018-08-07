class PrettyJSON {

    constructor(json, identSpaces=2){
        json = JSON.parse(json);
        this.stylizer = new Stylizer();
        this.doPretty = () =>this.getJSONFormat(json, identSpaces);
    }

    getNX(n, x=" ",str=""){
        Array.from(Array(n).keys()).forEach((e) => str+=x)
        return str;
    }

    prepareText(obj, identSpaces, initialIdentSpaces, color=false) {
        if(!color){
            for(var i in this.stylizer.getTags()){
                this.stylizer.getTags()[i] = "";
            }
        }

        var cls, string = '';
        for (var p in obj) {
            cls = typeof obj[p];
            if (obj[p] === null)
                string += this.getNX(initialIdentSpaces)+p+': NULL\n';

            else if (cls == 'object') {
                string += this.getNX(initialIdentSpaces)+p+': {\n';
                var newIdentationSpaces = initialIdentSpaces + identSpaces;
                string += this.prepareText(obj[p], identSpaces, newIdentationSpaces);
                string += this.getNX(initialIdentSpaces)+'}\n';
            }
            else if (cls == 'string')
                string += this.getNX(initialIdentSpaces)+p+': "'+obj[p]+'"\n';

            else
                string += this.getNX(initialIdentSpaces)+p+': '+obj[p]+'\n';

        }
        return string;
    }

    getJSONFormat(json, identSpaces) {
        return '{\n'+this.prepareText(json, identSpaces, identSpaces)+'}';
    }

}

class Stylizer {
    constructor(){
        this.colors = {
            'string': 'green',
            'number': 'darkorange',
            'boolean': 'blue',
            'null': 'magenta',
            'key': 'red'
        };

        this.htmlTags = [
            '<span class="colored-key">',
            '<span class="colored-null">',
            '<span class="colored-',
            '">',
            '</span>',
        ];

        this.getColors = () => this.colors;
        this.getTags = () => this.htmlTags;
    }
}
