function log(user,action,status){
	$.ajax({
		url:"/admin/syslog",
		method: "post",
		data:{
			user, action, status
		},
		success: function(data){
			console.log(data)
		}
	});
}

function showAlertFloat(color,msg){
	$(".float-alert p").text(msg);
	$(".float-alert").css({
		"display":"inline",
		"right":"0",
		"background":color
	}).delay(4000).fadeOut(100);
}

function filterDropDown(elementId, columnIndex, filterId, filterSearch){
    let values = [];

    let filterOption = document.getElementById(filterId);
    let table = document.getElementById(elementId).querySelectorAll("tr td:nth-child("+ columnIndex+")");

    for(let i = 0; i < table.length; i++){
        let column = table[i].textContent.replace(/\t|\n/g,'');
        if(values.indexOf(column) == -1){
            values.push(column);
        }
    }

    for(let i = 0; i < values.length; i++){
        filterOption.options.add( new Option(values[i],values[i]) )
    }
    filterId:onchange = ()=>{
        let fv,tr,td,tbl,txtVal;
        fv=filterOption.options[filterOption.selectedIndex].value.toUpperCase();
        tbl = document.getElementById(elementId);
        tr = tbl.getElementsByTagName("tr");
        for(let i = 0; i < tr.length; i++ ){
            td = tr[i].getElementsByTagName("td")[8];
            if(td){
                txtVal = td.textContent || td.innerText;
                if(txtVal.toUpperCase().indexOf(fv) > -1){
                    tr[i].style.display="";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }
        console.log(fv)
    }
    filterSearch:onkeyup = ()=>{
        let filterInput = document.getElementById(filterSearch);
        let fv,tr,td, td2,td1, tbl,txtVal;
        fv=filterInput.value.toUpperCase();
        tbl = document.getElementById(elementId);
        tr = tbl.getElementsByTagName("tr");
        for(let i = 0; i < tr.length; i++ ){
            td = tr[i].getElementsByTagName("td")[3];
            td2 = tr[i].getElementsByTagName("td")[4];
            td1 = tr[i].getElementsByTagName("td")[1];
            if(td || td2){
                txtVal = td.textContent || td.innerText;
                let v = td2.textContent || td2.innerText;
                let name = td1.textContent || td1.innerText;
                if(txtVal.toUpperCase().indexOf(fv) > -1 || v.toUpperCase().indexOf(fv) > -1 || name.toUpperCase().indexOf(fv) > -1){
                    tr[i].style.display="";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }
    }
    return values
}

export { log, showAlertFloat, filterDropDown };