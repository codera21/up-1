// JavaScript Document
(function ($) {

jQuery.fn.validation= function(options) 
{
		
		var defaults={
			Tab:false,
			DefaultMessages:true,
			ErrorsList:'',
		}
		var options=jQuery.extend(defaults,options);
		
		var THIS=this;
		$(this).addClass("validation");
		if(options.ErrorsList!='')
		{
			$(this).find(options.ErrorsList).addClass("errors_list");
		}
		return this.each(function() {	  
			
			$(THIS).submit(function(){
									
				var Submit=true;
				//Text,Password,File,Textarea
				$('input:text,input:password,input:file,textarea',THIS).each(function(){
					if(check(this)==false && Submit==true)
					{
						Submit=false;
					}
				});
				//Radio Button,Checkbox,Select
				$("input:radio,input:checkbox,select",THIS).each(function(){
					if(check_special(this)==false && Submit==true)
					{
						Submit=false;
					}
				});
				if(Submit==false)
				{
					$('html, body').animate({
						scrollTop: $("div.validation_error:first",THIS).offset().top-15
					}, 1000);	
				}
				return Submit;
			});
			
			//Text,Password,File,Textarea (Events)
			$("input:text,input:password,input:file,textarea",THIS).focusin(function() { 
			
				$(this).addClass("selected");
		
			}).focusout(function() { 
				
				$(this).removeClass("selected");
		
			}).blur(function(){
				
				check(this);
				
			}).keypress(function(evt){
				
				if(options.Tab==true)
				{
					var charCode = (evt.which) ? evt.which : evt.keyCode;
					if(maxlength(this)==true)
					{
						return tab(this,charCode);
					}
				}
		
			}).bind('contextmenu',function () {
				return false
			});
			//Radio Button,Checkbox,Select (Events)
			$("input:checkbox,input:radio",THIS).click(function(){
																
				return check_special(this);
				
			});
			$("select",THIS).change(function(){
				check_special(this);
				
			}).focusin(function() { 
			
				$(this).addClass("selected");
		
			}).focusout(function() { 
			
				$(this).removeClass("selected");
		
			});
			
		});
		
		//Check for Text,Password,File,Textarea
		function check(Element)
		{
			if(required(Element)==true)
			{
				if(valid(Element)==true)
				{
					if(minlength(Element)==true)
					{
						if(match_password(Element)==true)
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					else
					{
						return false;
					}
				}
				else
				{
					
					return false;
				}
			}
			else
			{
				
				return false;
			}
			
		}
		//Check Required Parameter
		function required(Element)
		{
			
			if($(Element).attr("required")!=null)
			{
				if($(Element).attr("required")=="true" || $(Element).attr("required")=="1")
				{
					
					if($(Element).val().length>0)
					{
						display_msg(Element,'',"required");
						return true;
					}
					else
					{
						var Message="This field is required.";
						display_msg(Element,Message,"required");
						return false;	
					}
				}	
			}
		}
		//Check Valid Parameter
		function valid(Element)
		{
			if($(Element).val().length>0)
			{
		
				var number = /^[0-9]+$/;
				var alpha = /^[a-zA-Z]+$/;
				var alphanumeric = /^[0-9a-zA-Z]+$/;
				var decimal=/^[-+]?[0-9]*\.?[0-9]*$/;
				var email=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				var url=/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/;
				
				
				var RegularExp='';
				var Message='';
				var Valid=String($(Element).attr("valid"));
				Valid=Valid.toLowerCase();
				if(Valid=="number")
				{
					RegularExp=number;
				  	Message='Please enter a valid number.';
				}
				else if(Valid=="alpha")
				{
					RegularExp=alpha;
				  	Message='Please enter a valid alpha.';	
				}
				else if(Valid=="alphanumeric")
				{
					RegularExp=alphanumeric;
				  	Message='Please enter a valid alphanumeric.';	
				}
				else if(Valid=="decimal")
				{
					RegularExp=decimal;
				  	Message='Please enter a valid decimal.';	
				}
				else if(Valid=="url")
				{
					RegularExp=url;
				  	Message='Please enter a valid URL.';
				}
				else if(Valid=="email")
				{
					RegularExp=email;
				  	Message='Please enter a valid email address.';
				}
				
				var Val=allow(Element);
				
				if(Val!="" && RegularExp!="" )
				{
					 if (Val.match(RegularExp))
					 {
						display_msg(Element,'',"valid");
						return true;
					  }
					  else
					  {
						display_msg(Element,Message,"valid");
						return false;
					  }	
				}
				else
				{
					display_msg(Element,'',"valid");
					return true;
				}
			  }
			  else
			  {
				  display_msg(Element,'',"valid");
				  return true;
			  }
		}
		//Check Allow Parameter and Extract Allow Characters from String
		function allow(Element)
		{
			var Val;
			if($(Element).attr("allow")!=null)
			{
				Val=$(Element).val();
				for(i=0;i<$(Element).attr("allow").length;i++)
				{
					var Char=$(Element).attr("allow").charAt(i);
					Val = Val.split(Char);
					Val = Val.join("");
					
				}
			}
			else
			{
					Val=$(Element).val();
			}
			return Val;
		}
		//Check MinLength Parameter
		function minlength(Element)
		{
			if($(Element).attr("minlength")!=null)
			{
				if($(Element).val().length<$(Element).attr("minlength"))
				{
					var Message="Please enter at least {"+$(Element).attr("minlength")+"} character(s).";
					display_msg(Element,Message,"minlength");
					return false;
				}
				else if($(Element).val().length>=$(Element).attr("minlength"))
				{
					display_msg(Element,'',"minlength");
					return true;	
				}
			}
			else
			{
				return true;	
			}
		}
		//Check MaxLength Parameter
		function maxlength(Element)
		{
			if($(Element).attr("maxlength")!=-1)
			{
				if($(Element).val().length>=$(Element).attr("maxlength"))
				{
					var Message="Please enter no more than {"+$(Element).attr("maxlength")+"} character(s).";
					display_msg(Element,Message,"maxlength");
					return false;
				}
				else if($(Element).val().length<$(Element).attr("maxlength"))
				{
					display_msg(Element,'',"maxlength");
					return true;	
				}
			}
			else
			{
				return true;	
			}
		}
		//Check Match Password Parameter
		function match_password(Element)
		{
		
			if($(Element).is("input:password"))
			{
				if($(Element).attr("match")!=null)
				{
					var Match="#"+$(Element).attr("match");
					if($(Match).val()!=$(Element).val())
					{
						var Message="Please enter the same password as above";
						display_msg(Element,Message,"match");
						return false;
					}
					else
					{
						display_msg(Element,'',"match");
						return true;
					}
				}
				else
				{
					return true;
				}
			}
			else
			{
				return true;
			}
		}
		//Tabs
		function tab(Element,charCode)
		{
				var Result;
				if($(Element).attr("valid")=='number')
				{
					if(charCode==8 ||(charCode>=48 && charCode<=57))
					{
						Result=true;
					}
					else
					{
						Result=false;
					}
				}
				else if($(Element).attr("valid")=='alpha')
				{
					
					if(charCode==8 || (charCode>=65 && charCode<=90) || (charCode>=97 && charCode<=122))
					{
						Result=true;
					}
					else
					{
						Result=false;
					}
				}
				else if($(Element).attr("valid")=='alphanumeric')
				{
					
					if(charCode==8 || (charCode>=48 && charCode<=57) || (charCode>=65 && charCode<=90) || (charCode>=97 && charCode<=122))
					{
						Result=true;
					}
					else
					{
						Result=false;
					}
				}
				else if($(Element).attr("valid")=='decimal')
				{
					if(charCode==8 || charCode==46 || (charCode>=48 && charCode<=57))
					{
						
						if(charCode==46)
						{
							var Value=$(Element).val();
							if(Value.indexOf(".")==-1)
							{
								Result=true;
							}
							else
							{
								Result=false;
							}
						}
						else
						{
							Result=true;
						}
					}
					else
					{
						Result=false;
					}
				}
				
				if(Result==false)
				{
					if($(Element).attr("allow")!=null)
					{
						var character=String.fromCharCode(charCode);
						var Text=$(Element).attr("allow");
						var Find=false;
						for(i=0;i<Text.length;i++)
						{
							if(character==Text.charAt(i))
							{
								Result=true;
							}
						}
					}
				}
				
				return Result;

		}
		//Special Check for Radio Button,Checkbox,Select
		function check_special(Element)
		{
			if($(Element).is("input:radio"))
			{
				var Name=$(Element).attr("name");
				if($("[name="+Name+"]").attr("required")=="true" || $("[name="+Name+"]").attr("required")=="1")
				{
					if($(":checked[name="+Name+"]").length==0)
					{
						var Message="Please select at least {1} options(s).";
						display_msg(Element,Message,"required");
						return false;
					}
					else
					{
						display_msg(Element,'',"required");
						return true;
					}
				}
			}
			else if($(Element).is("input:checkbox"))
			{
				var Name=$(Element).attr("name");
				var Result;
				if($("[name="+Name+"]").attr("minlength")!=-1)
				{
					if($(":checked[name="+Name+"]").length<$("[name="+Name+"]").attr("minlength"))
					{
						var Message="Please check at least {"+$("[name="+Name+"]").attr("minlength")+"} options(s).";
						display_msg(Element,Message,"minlength");
						Result=false;
					}
					else
					{
						display_msg(Element,'',"minlength");
						Result=true;
					}
				}
				if($("[name="+Name+"]").attr("maxlength")!=-1)
				{
					
					if($(":checked[name="+Name+"]").length>$("[name="+Name+"]").attr("maxlength"))
					{
						Result=false;
					}
					else
					{
						Result=true;	
					}
				}
				return Result;
			}
			else if($(Element).is("select"))
			{
				if($(Element).attr("required")!=null)
				{
					if($(Element).attr("required")=="true" || $(Element).attr("required")=="1")
					{
						
						if($(Element).val().length>0)
						{
							display_msg(Element,'',"required");
							return true;
						}
						else
						{
							var Message="Please select the option from select box.";
							display_msg(Element,Message,"required");
							return false;
						}
					}	
				}
			}
			
		}
		//Find Custom Error
		function errors_msg(Element,Error)
		{
			var Message='';
			
			if(options.DefaultMessages==false && options.ErrorsList!='')
			{
				var Name=$(Element).attr("name");
				var ID=$(Element).attr("id");
				var Class=$(Element).attr("class");
				Name=Name.replace("[]", "");
				//Message=Error;
				if($(THIS).find('.'+Name+' div.'+Error).text()!='')
				{
					Message=$(THIS).find('.'+Name+' div.'+Error).text();
				}
				else if($(THIS).find('.'+ID+' div.'+Error).text()!='')
				{
					Message=$(THIS).find('.'+ID+' div.'+Error).text();
				}
				/*else if($(THIS).find('.'+Class+' div.'+Error).text()!='')
				{
					Message=$(THIS).find('.'+Class+' div.'+Error).text();
				}*/
			}
			
			return Message;
		}
		//Display Message
		function display_msg(Element,Message,CheckName)
		{
			
			
			if(errors_msg(Element,CheckName)!='' && Message!="")
			{
				
				var Message=errors_msg(Element,CheckName);
			}
			
			if($(Element).is("input:radio") || $(Element).is("input:checkbox"))
			{
				if(Message!="")
				{
					/*$(Element).parents("fieldset:first").next().remove('div.validation_error,div.validation_correct');
					$(Element).parents("fieldset:first").after("<div class='validation_error'>"+Message+"</div>");*/
					$(Element).parent().find('div.validation_error,div.validation_correct').remove();
					$(Element).parent().append("<div class='validation_error'>"+Message+"</div>");
				}
				else
				{
					$(Element).parent().find('div.validation_error,div.validation_correct').remove();
					/*$(Element).parents("fieldset").next().remove('div.validation_error,div.validation_correct');*/
				}
			}
			else
			{
				if(Message!="")
				{
					$(Element).next().remove('div.validation_error,div.validation_correct');
					$(Element).after("<div class='validation_error'>"+Message+"</div>");
				}
				else
				{
					$(Element).next().remove('div.validation_error,div.validation_correct');
					$(Element).after("<div class='validation_correct'>&nbsp;</div>");
				}
				
			}
			
		
		}
};

})(jQuery)	
