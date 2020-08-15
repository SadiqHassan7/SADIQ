var a=["ali","abdi","good"];
var b=["how", "nice"];
var j=b.map( function(ele) {
var ingr=ele;
a.forEach(function(el) {
ingr=ingr.replace(el, "what")})});

console.log(j);