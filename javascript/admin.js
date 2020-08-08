
jQuery.expr[':'].Contains = function(a, i, m) {
  return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
};


$("#mfs-list-table-search-input").on("keyup", function(e){
  var val = e.target.value;
  if(val){
    $(".mfs-list-table tr td").parent("tr").hide();
    $(".mfs-list-table tr td:Contains('"+val+"')").parent("tr").show();
  }
  else{
    $(".mfs-list-table tr td").parent("tr").show();
  }
});