/**
 * Created by Johan on 7/26/2017.
 */
function addFields(){
    var number = document.getElementById("member").value;
    var container = document.getElementById("container");
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    for (i=0;i<number;i++){
        container.appendChild(document.createTextNode("Friend " + (i+1) + ":"));
        var input = document.createElement("input");
        input.type = "text";
        input.name = "friends[]";
        container.appendChild(input);
        container.appendChild(document.createElement("br"));
    }
    var button = document.createElement("input");
    button.type = "submit";
    button.value = "Click to add"
    container.appendChild(document.createElement("br"));
    container.appendChild(button);
}