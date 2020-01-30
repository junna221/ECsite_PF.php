(function(){
  var show = document.getElementById('show');
  var hide = document.getElementById('hide');
  
  show.addEventListener('click', function(){
    document.querySelector('.list').className = 'list-menu-open';
  });
  
  hide.addEventListener('click', function(){
    document.querySelector('.list-menu-open').className = 'list';
  });
})();