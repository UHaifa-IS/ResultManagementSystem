var  x = $("#walls_settings_timers").find("th,td");

var i = $("#walls_settings_timers").find("tr").length;

var j = x.length/i;
console.log(i , j);
var newT= $("<table>").appendTo("body");
for (j1=0; j1<j;j1++){
    var temp = $("<tr>").appendTo(newT);
    for(var i1=0;i1<i; i1++){
        temp.append($(x[i1*j+j1]).clone());
    }

}
