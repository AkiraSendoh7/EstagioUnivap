var ele = document.getElementById('container');

ej.base.enableRipple(true);

// Initialization of Dialog component
var dialog = new ej.popups.Dialog({
    // Enables the header
    header: 'Informações OS',
    // Enables the close icon button in header
    showCloseIcon: true,
    // Dialog content
    content: 'tabela vem aqui',
    // The Dialog shows within the target element
    target: document.getElementById("container"),
    // Dialog width
    width: '650px',
});
// Render initialized Dialog
dialog.appendTo('#dialog');

// Sample level code to handle the button click action
function buttonclick(pos){

    document.getElementsByName('targetButton')[pos].onclick = function() {
        var N_OS = document.getElementsByName("OSn")[pos].innerHTML.substr(0,5);
        var dep = document.getElementsByName("departamento")[pos].innerHTML;

        $.ajax({
            type: 'POST',
            url: 'fetchListaOS.php',
            async: 'false',
            data: {
                numero_OS: N_OS,
                dept: dep,
            },success: function(data){
                dialog.content = data;
            }

        })
        if(ele.style.visibility == "hidden") {
            ele.style.visibility = "visible";
        }   
        // Call the show method to open the Dialog
        dialog.show();
    }
}
