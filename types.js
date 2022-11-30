/**
 * VARIABLES TYPES:
 * INT (INTEGER), FLOAT/DOUBLES (NUMEROS NÃO INTEIROS), 
 * CHAR (CARACTER), STRING (CADEIRAS DE CARACTERES), BOOLEAN (VERDADEIRO OU FALSO)
 */

/**
 * LINGUAGEM TIPADA
 * int idade = 10;
 * idade = 20;
 * string nome = "João";
 * double weight = 80.5;
 */

 idade = 20; //Inteiro (number)
 console.log(idade);
 console.log(Number.isInteger(idade));
 console.log(typeof idade); //tipo de
 idade = "Vinte"; //String
 console.log(idade);
 console.log(typeof idade); //tipo de
 idade = 20.0; //Double (number)
 console.log(Number.isInteger(idade));
 console.log(idade);
 console.log(typeof idade); //tipo de
 idade = true; //Boleano
 console.log(idade);
 console.log(typeof idade); //tipo de
 
 nota = 9.2;
 isInteger = nota % 2 === 0;
 if (isInteger) {
     console.log("A nota é válida");
 } else {
     console.log("A nota não é válida");
 }
 
 console.log('----------------------------------');
 //= -> atribuição
 let quantidadeDeGatos = 2;
 let quantidadeDeCachorros = '2';
 //== -> comparação de valor
 let comparacaoA = quantidadeDeGatos == quantidadeDeCachorros;
 console.log(comparacaoA);
 //=== -> comparação de tipo e valor
 let comparacaoB = quantidadeDeCachorros === quantidadeDeGatos;
 console.log(comparacaoB);
 let comparacaoC = quantidadeDeGatos !== quantidadeDeCachorros;
 console.log(comparacaoC);
 let comparacaoD = quantidadeDeGatos != quantidadeDeCachorros;
 console.log(comparacaoD);
 console.log(quantidadeDeCachorros + quantidadeDeGatos);
 
 /**
  * ISS: 5%
  * 100
  */
 
 let valorDoServico = 500;
 let valorDoISS = valorDoServico * 0.05;
 let minValueIss = 100;
 let isIssMinValue = valorDoISS === minValueIss;
 let isIssMinValueGreater = valorDoISS >= minValueIss;
 let isIssMinValueLess = valorDoISS <= minValueIss;
 let isIssMinValueDifferent = valorDoISS !== minValueIss;
 
 if (isIssMinValue) {
     console.log("O ISS é igual a 100");
 } else {
     console.log("O ISS é menor que 100");
 }
 console.log('----------------------------------');
 /**
  * OPERADOR TERNÁRIO
  */
 let salarioA = 1200;
 let salarioB = 1800;
                  //CONDIÇÃO            //SE VERDADE        //SE FALSO
 let isAGreater = salarioA > salarioB ? "A é maior que B" : "B é maior que A";
 
 let isAGreater2 = null;
 if (salarioA > salarioB) {
     isAGreater2 = "A é maior que B";
 } else {
     isAGreater2 = "B é maior que A";
 }
 console.log(isAGreater);
 console.log(isAGreater2);
 
 /**
  * TS / TYPE SCRIPT
  * SUPERSET DO JS
  */
 
 let names = [true, 4.0, 1, "Luiz"];
 console.log(names[3]);