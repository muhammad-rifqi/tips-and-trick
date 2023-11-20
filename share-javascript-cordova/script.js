function socialShare() {
    var canvas = document.getElementById("receipt");
    var context = canvas.getContext("2d");

    const messages = [
        "################################",
        "Central Jogos",
        "################################",
        "Apostador: test",
        "Valor apostado: R$ 5,00",
        "Valor de retorno: R$ 6,15",
        "Data da aposta: 19/02/2017 15:07",
        "Quantidade de jogos: 1",
        "--------------------------------",
        "Vasco X Flamengo",
        "Empate: 1.23",
        "10/03/2017 15:30",
        "================================",
        "Cambista: Cambista Teste",
        "Telefone: (82) 9977-8877"
    ];

    context.font = "12px Courier new";

    y = 12;
    for (var i in messages) {
        context.fillText(messages[i], 0, y);
        y += 18;
    }

    /*var baseTest = "data:image/png;base64,R0lGODlhZgAZALMAAAAAABgYGCEhISkpKSkxQjk5QkZGTnF7i2uEvXOEvXeMvX+UxqSx0MfS5dPe7Nbn7ywAAAAAZgAZAAAE/hDJSau9OOvNu/9gKI5kaZ5oOjlOxmpK82qzal+1lVvyrre3IMX38g2BRklSiCK2lojZEsosOaNAjDT7sxgI4LB4TC6HDacpt8vxEQDwuHxOr8cJ6fWRpsfp33aBgndKLQsyDAiHDomLLA0LWAuLiUWGPQ6QWCycipiaL5QIgAABDJwMAgACpyypACwABacGAAanB3hYMry8L5iPm5wNWMXAmcKdx8SPnC2kragA0a6wjNcMp6cNuqgJ3pYrT5kMC+HhhenFNZaZ5s9xsXCx8tbWDgf3+SzdDpGS6diNE7duoLotAAv+e0GqHj0H8SCyGDDPAUVr/QgGzIKuYEFntEhCKnqkQGOxhhDnOJSY0l7FjOo8biR4DiSxYjhjsFjIEV5FOitdCuUXUyBOmR477jmKoFWlnqMiAm35UOrLolCNah1oBOEMBR0ZWrUXNOjVo1tpAnmXFCrOsAZPjq360yxGrASXJWPk8ZhIYzbRPotFjdE0kAyGUnUAU7CnYZEQJ/DoiNzBS5AdE4jFCpWqzq5U2SVapfQEUoNSz9FluvQBA7Bjy55Nu3bsA61z697Nm0QEAAA7";*/


    console.log(context.canvas.toDataURL());
    var base64 = context.canvas.toDataURL();

    console.log(base64);

    /*window.plugins.socialsharing.share(
        null, 
        'Receipt', 
        base64, 
        null
    );*/
}