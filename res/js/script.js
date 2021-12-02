var tabButtons = document.querySelectorAll(".tabContainer .buttonContainer button");
var tabPanel = document.querySelectorAll(".tabContainer .tabPanel");

function showPanel(panelIndex, colorCode){
	console.log('aqui');
	tabButtons.forEach(function(node){
		node.style.backgroundColor="";
		node.style.color="";
	});
	tabButtons[panelIndex].style.backgroundColor=colorCode;
	tabButtons[panelIndex].style.color="white";
	tabPanel.forEach(function(node){
		node.style.display="none";
	});
	tabPanel[panelIndex].style.display="block";
	tabPanel[panelIndex].style.backgroundColor=colorCode;
}



/*=======================Mascara Telefone=============================*/
function mascaraDeTelefone(telefone){
    const textoAtual = telefone.value;
    const isCelular = textoAtual.length === 9;
    let textoAjustado;
    if(isCelular) {
        const parte0 = textoAtual.slice(0,2);
        const parte1 = textoAtual.slice(2,7);
        const parte2 = textoAtual.slice(7,11);
        textoAjustado = `(${parte0}) ${parte1}-${parte2}`
        console.log(textoAjustado)
    } else {
        const parte0 = textoAtual.slice(0,2);
        const parte1 = textoAtual.slice(2,6);
        const parte2 = textoAtual.slice(6,10);
        textoAjustado = `(${parte0}) ${parte1}-${parte2}`
        console.log(textoAjustado)
    }

    telefone.value = textoAjustado;
}
function tiraHifen(telefone) {
    const textoAtual = telefone.value;
    const textoAjustado = textoAtual.replace(/\-/g, '');

    telefone.value = textoAjustado;
}
/*====================================================*/



    $('#print').click(function(){

        $('.page-1').printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import parent page css
            importStyle: false,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "",                // path to additional css file - use an array [] for multiple
            pageTitle: "",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333,            // variable print delay
            header: null,               // prefix to html
            footer: null,               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: false,              // copy canvas content
            doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
            removeScripts: true,       // remove script tags from print content
            copyTagClasses: true,      // copy classes from the html & body tag
            beforePrintEvent: null,     // callback function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed
        });

    })
