/**
 * Created by nikita on 19.06.2017.
 */
function validate() {
    var bool = true;
    var form = document.forms['mainForm'];
    var date = document.forms['mainForm']['date'];
    var city = form['city'];
    date.className='etCustom';
    city.className='etCustom';
    var regexpDate = /^(19|20)[0-9]{2}-[0|1][0-9]-[0-3][0-9]/;
    var regexpCity =/^[^!@#$%^&*()_<>]/;
    if(!regexpDate.test(date.value)) {
        bool = false;
        date.className='etCustomError';
    }
    if(!regexpCity.test(city.value)){
        city.className='etCustomError';
        bool = false;
    }
    return bool === true;
}


