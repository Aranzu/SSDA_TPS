
(function($){
    $.fn.multiEmails = function(options) {
        var settings = $.extend({
            color: "#144578",
            textColor: "#144578",
            fontAwesome: true,
        }, options );

            var keynum;
            var emailList = [];
            var hiddenField = $(this);
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            $(this)
            .after(
                '<input type="text" class="'+hiddenField.attr("class")+'" id="email" placeholder="Ingrese emails adicionales">'
                ).hide();

            $(document).on('keyup', '#email', function(e) {
                $('.email-error').remove();
                if(window.event){ // IE
                    keynum = e.keyCode;
                }
                else if(e.which){ // Netscape/Firefox/Opera
                    keynum = e.which;
                }
                if (keynum == 13){
                    let email = $('#email').val().replace(/\s+$/, '').split(",");
                    //console.log(email);
                    email.forEach(test_mail);
                    function test_mail(element) {

                        if (re.test(String(element).toLowerCase())){

                            if(!emailList.includes(element)){
                                emailList.push(element);
                            }
                            //console.log(emailList);
                            let displayList = '';

                            emailList.forEach((value, ind) => {
                                displayList += "<li style='background-color:"+hexToRgbA(settings.color)+";border-left: 3px solid"+settings.color+"'><input type='text' class='hide_style' name='ExtraRecipientsArr[]' value='"+value+"'readonly ><span class='float-right remove' data-index="+ind+">"+((settings.fontAwesome === true)?'<i class=\"fas fa-times\"></i>':'X')+"</span></li>"
                            } )
                            let buildEmailList = '<div id="show-emails"><ul id="email-lists" style="color:'+settings.textColor+'">'+displayList+'</ul></div>'
                            if($("#show-emails").length){
                                $("#show-emails").replaceWith(buildEmailList);
                            }else{
                                $('#email').parent().after(buildEmailList);
                            }
                            hiddenField.val(JSON.stringify(emailList));
                            $('#email').val('');
                        }
                        else{
                            let errrMessage = "<div class='email-error'>Por favor, ingresa un correo electrónico válido.</div>";
                            if($("#show-emails").length){
                                $("#show-emails").after(errrMessage);
                            }else{
                                $('#email').parent().after(errrMessage);
                                console.log($('#email').parent());
                            }
                        }
                    }
                }
            })

            $(document).on('click', ".remove", function () {
                let index = $(this).data("index");
                emailList.splice(index, 1);
                let displayList = '';
                emailList.forEach((value, ind) => {
                    displayList += "<li style='background-color:"+hexToRgbA(settings.color)+";border-left: 3px solid"+settings.color+"'>"+value+"<span class='float-right remove' data-index="+ind+">"+((settings.fontAwesome === true)?'<i class=\"fas fa-times\"></i>':'X')+"</span></li>"
                } )
                hiddenField.val(emailList);
                $("#show-emails ul").html(displayList);
            })

            function hexToRgbA(hex){
                var c;
                if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                    c= hex.substring(1).split('');
                    if(c.length== 3){
                        c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c= '0x'+c.join('');
                    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',0.08)';
                }
                throw new Error('Bad Hex');
            }

    };
}(jQuery))
