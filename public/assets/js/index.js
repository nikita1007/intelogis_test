// Form submission prohibition with selects "default" value
const forms = document.querySelectorAll('form');

forms.forEach(form => {
  form.onsubmit = (form_event) => {
    form_event.preventDefault();
    
    const selectsWithDefault = [];
    
    form.querySelectorAll('select').forEach(select => {

      select.onchange = (select_event) => {
        select.style.borderColor = '';
      };
      
      if (select.value === 'default') {
        selectsWithDefault.push(select.id);
        select.style.borderColor = 'red';
      }
    });    

    if (selectsWithDefault.length > 0) {
      form_event.preventDefault();
    } else {
      form.submit();
    }
  };
});
