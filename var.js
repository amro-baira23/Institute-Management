
var x,y;

function fun(x,y){
    var v = 0;
    function child1(){
        v= 10;
    }
    x = child1;
    function child2(){
        console.log(v);
    }
    y = child2;
    y();
    x();
    y();
    console.log(y)
}
fun();

console.log(y);