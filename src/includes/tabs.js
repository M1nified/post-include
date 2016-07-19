'use strict';
(function(jQuery){
	function openTab(menu,id){
		var i = jQuery(">ul>li>a",menu).index(jQuery("a[href=\"#"+id+"\"]"));
		i = (i<0 || jQuery(">ul>li>a[href=\"#"+id+"\"]",menu).parent().hasClass("ui-state-active")) ? 0 : i;
		jQuery(menu).tabs("option", "active", i);
		window.location.hash="!"+id;
	}
	var onHashChange = function onHashChange(evt){
		evt.preventDefault();
		var hash = window.location.hash;
		if(hash.match(/^#!/)===null){
			hash = hash.slice(1);
		}else{
			hash = hash.slice(2);
		}
		console.log(hash)
		openTab(jQuery('#jfmulticontent_c549'),hash);
	}
	window.onhashchange =  onHashChange;
	jQuery(function(){
		//--stare
		jQuery('#jfmulticontent_c549').tabs({
			heightStyle:'content',
			hide:{effect:'fadeOut',duration:'1000'},
			show:{effect:'fadeIn',duration:'1000'},
			create : onHashChange
		});
		jQuery('#jfmulticontent_c549 .tabanchors>li>a').on('click',function(evt){
			var link = jQuery(this).attr('href');
			if(link[0] === '#'){
				window.location.hash = "!"+jQuery(this).attr('href').slice(1);
			}else{
				window.location.href = link;
			}
		});
		//--nowe
		jQuery('.show_as_tabs').tabs({
			heightStyle:'content',
			hide:{effect:'fadeOut',duration:'1000'},
			show:{effect:'fadeIn',duration:'1000'},
			create : onHashChange
		});
		jQuery('.show_as_tabs .tabanchors>li>a').on('click',function(evt){
			var link = jQuery(this).attr('href');
			if(link[0] === '#'){
				window.location.hash = "!"+jQuery(this).attr('href').slice(1);
			}else{
				window.location.href = link;
			}
		});
	});
})(jQuery);