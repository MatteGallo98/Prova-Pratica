
var lib= {
  changeValue(event, formData){
    var nodoCheckbox = document.getElementById(event.target.id);
    console.log(nodoCheckbox.value);
    if(nodoCheckbox.value==1){
        formData[event.target.id]='0';
        nodoCheckbox.value=0;
    }else{
        formData[event.target.id]='1';
        nodoCheckbox.value=1;
    }
    console.log(formData);
 },
 nodoControl(id, updateData ){
    if(updateData && updateData[id]==1){
        var nodo=document.getElementById(id);
        nodo.click();
    }
 }
}


export default lib;