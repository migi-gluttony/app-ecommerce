import React from 'react';

function getAge(dateNaissance) {
    let from = dateNaissance.split("/");
    let birthdateTimeStamp = new Date(from[2], from[1] - 1, from[0]);
    let cur = new Date();
    let diff = cur - birthdateTimeStamp;
    let currentAge = Math.floor(diff / 31557600000);
    return currentAge;
}

export default class App extends React.Component {
    constructor(props) {
        super(props);
        this.nom = "Elbouchir";
        this.prenom = "Mohamed";
        this.dateNaissance = "01/01/2006";
    }
    render() {
        return (
            <div>
                <h1>Bonjour {this.nom} {this.prenom}</h1>
                <p>Vous avez {getAge(this.dateNaissance)} ans</p>
            </div>
        );
    }
}