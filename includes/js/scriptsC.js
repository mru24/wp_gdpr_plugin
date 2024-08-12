(function ($, root, undefined) {

	$(function () {

		'use strict';

var app = {
	async init() {
		this.jq = $;
		console.log("WW GDPR CLASS SCRIPT OK",this);

		this.consentPopup = this.jq('#wwgcbar');
    this.acceptBtn = this.jq('#acceptBtn');
    this.settingsModal = this.jq('#wwgcbar-modal');
    this.settingsBtn = this.jq('#settingsBtn');
    this.showMore = this.jq('.wwgcbar-show-description');
    this.closeModal = this.jq('#wwgcbar-modal-close');

    this.cookieCollapsedByID = this.jq('#wwgcbar-collapsed');
    this.cookieCollapsedByClass = this.jq('.wwgcbar-collapsed');

    this.techCookie = 'wwgcbar_tech_cookie';
    if(!$.cookie(this.techCookie)) { this.consentPopup.addClass('active'); };

    this.cookieValid = this.jq('#wwgcbarCookieValid');
    if(this.cookieValid.length>0) {
      this.cookieValidTime = this.cookieValid.val();
    }
    this.cookiesNonEssential = this.jq('#wwgcbarCookiesNonEssential');
    this.cookiesNonEssential.change((e)=>{
 this.jq(e.currentTarget).prop('checked')?this.jq(e.currentTarget).prop('checked',true):this.jq(e.currentTarget).prop('checked',false);
    console.log(this.jq(e.currentTarget).prop('checked'));
    });

    this.cookieCollapsedByID.on('click',(e)=>{
      e.preventDefault();
      this.consentPopup.addClass('active');
    })
    this.cookieCollapsedByClass.on('click',(e)=>{
      e.preventDefault();
      this.consentPopup.addClass('active');
    })
    this.acceptBtn.on('click',(e)=>{
      e.preventDefault();
      this.initAccept();
      this.consentPopup.removeClass('active');
    })
    this.settingsBtn.on('click',()=>{this.showSettings();});
    this.closeModal.on('click',()=>{this.hideSettings();});
    this.showMore.on('click',(e)=>{this.initDescription(e);});


	},
	async initAccept() {
		// REMOVE COOKIE
		// document.cookie = this.techCookie+'=; Max-Age=0;path=/';
	  if(!$.cookie(this.techCookie)) {
	    var validDate = new Date(Date.now() + this.cookieValidTime * 24*60*60*1000);
	    console.log(validDate);
	    let expires = "expires="+ validDate.toUTCString();
  		document.cookie = this.techCookie + "=ww_cookie;" + expires + ";path=/";
	  };
	  if(this.cookiesNonEssential.prop('checked')==true) {
	  	var validDate = new Date(Date.now() + this.cookieValidTime * 24*60*60*1000);
	    let expires = "expires="+ validDate.toUTCString();
	    document.cookie = 'non_essential_cookies=; Max-Age=0;path=/';
		document.cookie = 'non_essential_cookies=true;' + expires + ';path=/';
	  } else {
	  	var validDate = new Date(Date.now() + this.cookieValidTime * 24*60*60*1000);
	    let expires = 'expires='+ validDate.toUTCString();
	    document.cookie = 'non_essential_cookies=; Max-Age=0;path=/';
		document.cookie = 'non_essential_cookies=false;' + expires + ';path=/';
	  }
	},
	async showSettings() {
	  this.settingsModal.removeClass('hidden');
	  console.log($.cookie('non_essential_cookies'));
	  if($.cookie('non_essential_cookies')=='true') {
	  	this.cookiesNonEssential.prop('checked',true);
	  } else {
	  	this.cookiesNonEssential.prop('checked',false);
	  }
	},
	async hideSettings() {
    this.settingsModal.addClass('hidden');
	},
	async initDescription(el) {
	  this.jq(el.currentTarget).prev('p.wwgcbar-description').slideToggle();
	  this.jq(el.currentTarget).html()=="Show more"?this.jq(el.currentTarget).html('Hide'):this.jq(el.currentTarget).html('Show more');
	}
}

app.init();

	});

})(jQuery, this);
