//JSON syntax practice
var text ={"employees":['+'{"firstName": "John", "lastName": "Doe"},
'+'{"firstName": "Anna", "lastName":"Smith"},
'+'{"firstName":"Peter", "lastName":"Jones"}]}

var obj = JSON.parse(text);
var first =obj.employees[1];
console.log(first)