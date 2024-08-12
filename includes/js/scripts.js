console.log('WW GDPR scripts - OK');

const GA_tag = 'UA-177240674-1';
const domain = '.easy-code.co.uk';

const GAT_cookie = '_gat_gtag_UA_177240674_1';
const GID_cookie = '_gid';
const GA_cookie = '_ga';


const storageType = localStorage;
const consentPropertyName = 'cookies_essential';
const nonEssentialCookies = 'cookies_non_essential';

const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
const saveToStorage = () => storageType.setItem(consentPropertyName, true);
const hideNonEssential = () => storageType.getItem(nonEssentialCookies);

if(storageType.getItem(nonEssentialCookies) == "true" ) {
  console.log("checkbox-true");
} else {
  console.log("checkbox-false");
  clearCookie(GAT_cookie, domain,'/');
  clearCookie(GID_cookie, domain, '/');
  clearCookie(GA_cookie, domain,'/');
  window['ga-disable-' + GA_tag + ''] = true;
}

function clearCookie(name, domain, path){
  try {
      function Get_Cookie( check_name ) {
              // first we'll split this cookie up into name/value pairs
              // note: document.cookie only returns name=value, not the other components
              var a_all_cookies = document.cookie.split(';'),
                a_temp_cookie = '',
                cookie_name = '',
                cookie_value = '',
                b_cookie_found = false;

              for ( i = 0; i < a_all_cookies.length; i++ ) {
                    // now we'll split apart each name=value pair
                    a_temp_cookie = a_all_cookies[i].split( '=' );

                    // and trim left/right whitespace while we're at it
                    cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

                    // if the extracted name matches passed check_name
                    if ( cookie_name == check_name ) {
                        b_cookie_found = true;
                        // we need to handle case where cookie has no value but exists (no = sign, that is):
                        if ( a_temp_cookie.length > 1 ) {
                            cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
                        }
                        // note that in cases where cookie is initialized but no value, null is returned
                        return cookie_value;
                        break;
                    }
                    a_temp_cookie = null;
                    cookie_name = '';
              }
              if ( !b_cookie_found ) {
                return null;
              }
          }
          if (Get_Cookie(name)) {
                var domain = domain || document.domain;
                var path = path || "/";
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + domain + "; path=" + path;
          }
  }
  catch(err) {}
};
clearCookie('__utma','.yourdomain.com','/');
clearCookie('__utmz','.yourdomain.com','/');

window.onload = () => {
  const consentPopup = document.getElementById('wwgcbar');
  const acceptBtn = document.getElementById('acceptBtn');
  const settingsModal = document.getElementById('wwgcbar-modal');
  const settingsBtn = document.getElementById('settingsBtn');
  const showDescr = document.querySelectorAll('.wwgcbar-show-description');
  const closeModal = document.getElementById('wwgcbar-modal-close');
  const non_ess_cookies = document.getElementById('nncookies');
  const cookieCollapsedByID = document.querySelector('#wwgcbar-collapsed');
  const cookieCollapsedByClass = document.querySelector('.wwgcbar-collapsed');

  console.log("BUTTON****",cookieCollapsedByClass);

  const checkboxValue = () => {

    if(storageType.getItem(nonEssentialCookies) == "true" ) {
      console.log("checkbox-true");
      non_ess_cookies.checked = true;
      document.querySelector('.wwgcbar-checkbox-text').innerHTML = 'Enabled';
    } else {
      console.log("checkbox-false");
      non_ess_cookies.checked = false;
      document.querySelector('.wwgcbar-checkbox-text').innerHTML = 'Disabled';
    }
  }

  checkboxValue();

  const checkBox = event => {
    if(non_ess_cookies.checked == true) {
      non_ess_cookies.value = "true";
      document.querySelector('.wwgcbar-checkbox-text').innerHTML = 'Enabled';
    } else {
      non_ess_cookies.value = "false";
      document.querySelector('.wwgcbar-checkbox-text').innerHTML = 'Disabled';
    }
  }

  non_ess_cookies.addEventListener('click', checkBox);

  const addToStorage = () => {
    if(non_ess_cookies.value == "true") {
      storageType.setItem(nonEssentialCookies, true);
    } else {
      storageType.setItem(nonEssentialCookies, false);
    }
  }

  const acceptFn = event => {
    storageType.clear();
    saveToStorage(storageType);
    addToStorage(storageType);
    consentPopup.classList.remove('active');
    cookieCollapsed.classList.remove('hidden');
  }

  const showSettings = event => settingsModal.classList.remove('hidden');
  const closeSettings = event => settingsModal.classList.add('hidden');

  acceptBtn.addEventListener('click', acceptFn);
  settingsBtn.addEventListener('click', showSettings);
  closeModal.addEventListener('click', closeSettings);

  if(cookieCollapsedById.length>0) {
  	console.log("cookie button id");
    cookieCollapsedById.addEventListener('click', (e) => {
      e.preventDefault();
      consentPopup.classList.add('active');
    })
  }
  if(cookieCollapsedByClass.length>0) {
  	console.log("cookie button class");
    cookieCollapsedByClass[0].addEventListener('click', (e) => {
      e.preventDefault();
      consentPopup.classList.add('active');
    })
  }


  showDescr.forEach(item => {
    item.addEventListener('click', event => {
      item.classList.toggle('active');
      if(item.nextElementSibling) {
        item.nextElementSibling.classList.toggle('hidden');
      } else if(item.previousElementSibling) {
        item.previousElementSibling.classList.toggle('hidden');
        item.previousElementSibling.previousElementSibling.children[0].classList.toggle('hidden');
      }
      if(item.classList.contains('active')) {
        item.innerHTML = "Show less";
      } else {
        item.innerHTML = "Show more";
      }
    });
  });

  if(shouldShowPopup()) {
    setTimeout(function() {
      consentPopup.classList.add('active');
    }, 2000)
  } else {
    if(cookieCollapsed) {
      cookieCollapsed.classList.remove('hidden');
    }
  }
}






