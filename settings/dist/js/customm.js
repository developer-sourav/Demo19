/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/** ******  left menu  *********************** **/
$(function () {
    $('#sidebar-menu li ul').slideUp();
    $('#sidebar-menu li').removeClass('active');

    $('#sidebar-menu li').click(function () {
        if ($(this).is('.active')) {
            $(this).removeClass('active');
            $('ul', this).slideUp();
            $(this).removeClass('nv');
            $(this).addClass('vn');
        } else {
            $('#sidebar-menu li ul').slideUp();
            $(this).removeClass('vn');
            $(this).addClass('nv');
            $('ul', this).slideDown();
            $('#sidebar-menu li').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('#menu_toggle').click(function () {
        if ($('body').hasClass('nav-md')) {
            $('body').removeClass('nav-md');
            $('body').addClass('nav-sm');
            $('.left_col').removeClass('scroll-view');
            $('.left_col').removeAttr('style');
            $('.sidebar-footer').hide();

            if ($('#sidebar-menu li').hasClass('active')) {
                $('#sidebar-menu li.active').addClass('active-sm');
                $('#sidebar-menu li.active').removeClass('active');
            }
        } else {
            $('body').removeClass('nav-sm');
            $('body').addClass('nav-md');
            $('.sidebar-footer').show();

            if ($('#sidebar-menu li').hasClass('active-sm')) {
                $('#sidebar-menu li.active-sm').addClass('active');
                $('#sidebar-menu li.active-sm').removeClass('active-sm');
            }
        }
    });
});

/* Sidebar Menu active class */
$(function () {
    var url = window.location;
    $('#sidebar-menu a[href="' + url + '"]').parent('li').addClass('current-page');
    $('#sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');
	
	 $('#menu_toggle').click();
});

/** ******  /left menu  *********************** **/



/** ******  tooltip  *********************** **/
$(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    /** ******  /tooltip  *********************** **/
    /** ******  progressbar  *********************** **/
if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar(); // bootstrap 3
}
/** ******  /progressbar  *********************** **/
/** ******  switchery  *********************** **/
if ($(".js-switch")[0]) {
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function (html) {
        var switchery = new Switchery(html, {
            color: '#26B99A'
        });
    });
}
/** ******  /switcher  *********************** **/
/** ******  collapse panel  *********************** **/
// Close ibox function
$('.close-link').click(function () {
    var content = $(this).closest('div.x_panel');
    content.remove();
});

// Collapse ibox function
$('.collapse-link').click(function () {
    var x_panel = $(this).closest('div.x_panel');
    var button = $(this).find('i');
    var content = x_panel.find('div.x_content');
    content.slideToggle(200);
    (x_panel.hasClass('fixed_height_390') ? x_panel.toggleClass('').toggleClass('fixed_height_390') : '');
    (x_panel.hasClass('fixed_height_320') ? x_panel.toggleClass('').toggleClass('fixed_height_320') : '');
    button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
    setTimeout(function () {
        x_panel.resize();
    }, 50);
});
/** ******  /collapse panel  *********************** **/
/** ******  iswitch  *********************** **/
if ($("input.flat")[0]) {
    $(document).ready(function () {
        $('input.flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
}
/** ******  /iswitch  *********************** **/
/** ******  star rating  *********************** **/
// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function ($, window) {
    var Starrr;

    Starrr = (function () {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) {}
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function () {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function () {
    return $(".starrr").starrr();
});

$(document).ready(function () {

    $('#stars').on('starrr:change', function (e, value) {
        $('#count').html(value);
    });


    $('#stars-existing').on('starrr:change', function (e, value) {
        $('#count-existing').html(value);
    });

});
/** ******  /star rating  *********************** **/
/** ******  table  *********************** **/
$('table input').on('ifChecked', function () {
    check_state = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    check_state = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
//////Custom css

/*  tinymce.init({
    selector: '.tinymceedit',
	branding: false,
  });*/
  
tinymce.init({
  selector: 'textarea.tinymceedit',
  height: 300,
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'paste textcolor colorpicker textpattern imagetools codesample  help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor  | codesample help',
  image_advtab: true,
  branding:false
 }); 
 
 tinymce.init({
  selector: 'textarea.tinymceedit_minimal',
  height: 150,
  plugins: [
    'lists link  charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code',
    'insertdatetime nonbreaking save table contextmenu directionality',
    'paste textcolor colorpicker textpattern codesample  help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ',
  toolbar2: 'print preview media | forecolor backcolor  | codesample help',
  image_advtab: true,
  branding:false
 });   

var check_state = '';
$('.bulk_action input').on('ifChecked', function () {
    check_state = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.bulk_action input').on('ifUnchecked', function () {
    check_state = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.bulk_action input#check-all').on('ifChecked', function () {
    check_state = 'check_all';
    countChecked();
});
$('.bulk_action input#check-all').on('ifUnchecked', function () {
    check_state = 'uncheck_all';
    countChecked();
});

function countChecked() {
        if (check_state == 'check_all') {
            $(".bulk_action input[name='table_records']").iCheck('check');
        }
        if (check_state == 'uncheck_all') {
            $(".bulk_action input[name='table_records']").iCheck('uncheck');
        }
        var n = $(".bulk_action input[name='table_records']:checked").length;
        if (n > 0) {
            //$('.column-title').hide();
			$('.del_all').hide();
            $('.bulk-actions').show();
            $('.action-cnt').html(n + ' Records Selected');
        } else {
            //$('.column-title').show();
			$('.del_all').show();
            $('.bulk-actions').hide();
        }
    }
    /** ******  /table  *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******    *********************** **/
    /** ******  Accordion  *********************** **/

$(function () {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

/** ******  Accordion  *********************** **/
/** ******  scrollview  *********************** **/
$(document).ready(function () {
  
            $(".scroll-view").niceScroll({
                touchbehavior: true,
                cursorcolor: "rgba(42, 63, 84, 0.35)"
            });
			

    var elems = document.getElementsByClassName('confirmdelete');
    var confirmIt = function (e) {
        if (!confirm('Are you sure? Continue with delete.')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }			


	$('.setrecordsperpage').change(function(e) {
		var cur_val=$(this).val();
		var redicurl=$(this).attr('data-redicurl');
		
		
		$.post( admin_url+"/ajax-requests/setrecordsperpage.php", { records_per_page: cur_val })
		  .done(function( data ) {
			if(data=="ok")
			{
				window.location=redicurl;
			}
		});			
		
	});
	

    $('#delete_bulk_all').click(function () {
       
		if (confirm("Continue with delete") == false) {
			return false;
		} 	   
		
		var rec_ref=$(this).attr('data-ref');
		var redicurl=$(this).attr('data-redicurl');
	   
		$.post( admin_url+"/ajax-requests/delrecords.php", { rec_ref: rec_ref })
		  .done(function( data ) {
			if(data=="ok")
			{
				window.location=redicurl;
			}
		});			
					
    });	
	
	
	$('#all_tasks_cnt').on("keyup",".task_name_inp",function(e){
		var cur_val=$( this ).val();
		if(cur_val==='')
		{
			$(this).parents('.each_task_bx').find(".task_head .tk_name").text('Add a Task Name');	
		}
		else
		{
			$(this).parents('.each_task_bx').find(".task_head .tk_name").text(cur_val);	
		}
	});
	
	$('#add_task_bttn').click(function(e) {
        var tsk_row_frmt=$('#task_row_format').html();
		$('#all_tasks_cnt').append(tsk_row_frmt);
		return false;
    });
	
	$('#all_tasks_cnt').on("click",".remove_tsk",function(e){
		console.log('kkkk');
        var r = confirm("Do you want to remove this record?");
		
		if (r == true) {
			$(this).parents('.each_task_bx').remove();
		}
    });


	$('#add_task_bttn1').click(function(e) {
        var tsk_row_frmt=$('#task_row_format1').html();
		$('#all_tasks_cnt1').append(tsk_row_frmt);
		return false;
    });
	
	$('#all_tasks_cnt1').on("click",".remove_tsk1",function(e){
		console.log('kkkk');
        var r = confirm("Do you want to remove this record?");
		
		if (r == true) {
			$(this).parents('.each_task_bx1').remove();
		}
    });



	$('#add_task_bttn2').click(function(e) {
        var tsk_row_frmt=$('#task_row_format2').html();
		$('#all_tasks_cnt2').append(tsk_row_frmt);
		return false;
    });
	
	$('#all_tasks_cnt2').on("click",".remove_tsk2",function(e){
		console.log('kkkk');
        var r = confirm("Do you want to remove this record?");
		
		if (r == true) {
			$(this).parents('.each_task_bx2').remove();
		}
    });
	
	
	$('#add_task_bttn3').click(function(e) {
        var tsk_row_frmt=$('#task_row_format3').html();
		$('#all_tasks_cnt3').append(tsk_row_frmt);
		return false;
    });
	
	$('#all_tasks_cnt3').on("click",".remove_tsk3",function(e){
		console.log('kkkk');
        var r = confirm("Do you want to remove this record?");
		
		if (r == true) {
			$(this).parents('.each_task_bx3').remove();
		}
    });

	$('#add_task_bttn4').click(function(e) { 
        var tsk_row_frmt=$('#task_row_format4').html();
		$('#all_tasks_cnt4').append(tsk_row_frmt);
		return false;
    });
	
	$('#all_tasks_cnt4').on("click",".remove_tsk4",function(e){
		console.log('kkkk');
        var r = confirm("Do you want to remove this record?");
		
		if (r == true) {
			$(this).parents('.each_task_bx4').remove();
		}
    });

	$('#add_task_bttn5').click(function(e) {
        var tsk_row_frmt=$('#task_row_format5').html();
		$('#all_tasks_cnt5').append(tsk_row_frmt);
		return false;
    });
	
	$('#all_tasks_cnt5').on("click",".remove_tsk5",function(e){
		console.log('kkkk');
        var r = confirm("Do you want to remove this record?");
		
		if (r == true) {
			$(this).parents('.each_task_bx5').remove();
		}
    });
		
	$('#all_tasks_cnt').on("change",".start_time",function(e){
		var start_time=$(this).val();
		
		var end_sel_obj=$(this).parents('.each_w_day').find('.end_time');
		//var options_obj=end_sel_obj.getElementsByTagName("option");
		end_sel_obj.val('');
		
		$(end_sel_obj).find('option').each(function(index, element) {
			
		  if ($(this).val()!='')
		  {
			  if ($(this).val()<=start_time) {
				$(this).attr("disabled", "disabled");
				$(this).css('display','none');
				//console.log($(this).val());
			  }
			  else
			  {
				  $(this).removeAttr("disabled");
				  $(this).css('display','block');
			  }			  
		  }
		  $(this).parents('.each_w_day').find('.sub_hrs').text('0 hrs');
		  $(this).parents('.each_w_day').find('.day_total').val(0);
        });
		
		resetWeeklyTotal();

    });
	
	$('#all_tasks_cnt').on("change",".end_time",function(e){
		var end_time=$(this).val();
		var start_time=$(this).parents('.each_w_day').find('.start_time').val();
		
		if(end_time!=''&&start_time!='')
		{
			var time_dif=time_diff(start_time, end_time);
			$(this).parents('.each_w_day').find('.sub_hrs').text(time_dif+' hrs');
			$(this).parents('.each_w_day').find('.day_total').val(time_dif);
			
		}
		else
		{
			 $(this).parents('.each_w_day').find('.sub_hrs').text('0 hrs');
			 $(this).parents('.each_w_day').find('.day_total').val(0);
		}
		
		resetWeeklyTotal();
	});
	
	
	



/*Returns Time difference form 2 times*/
function time_diff(start, end) {
    start = start.split(":");
    end = end.split(":");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(diff / 1000 / 60);

    // If using time pickers with 24 hours format, add the below line get exact hours
    if (hours < 0)
       hours = hours + 24;

    return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
}

////calculate weekly total
function resetWeeklyTotal()
{
	var week_total=0;
	var tot_h=0;
	var tot_m=0;
	
	$('#all_tasks_cnt').find('.day_total').each(function(index, element) {
					
			var day_val=$(this).val();
				
			
		  if (day_val!=0)
		  {
			  var day_val_arr=day_val.split(":");
			  
			  tot_h=tot_h+parseInt(day_val_arr[0]);
			  tot_m=tot_m+parseInt(day_val_arr[1]);
			  
		  }
		  
      });
	  
	if (tot_m >= 60) {
        // Divide minutes by 60 and add result to hours
        tot_h += Math.floor(tot_m / 60);
        // Add remainder of totalM / 60 to minutes
        tot_m = tot_m % 60;
    }
	
	if(tot_h>0||tot_m>0)
	{
		$('#total_time_s').text('( '+tot_h+':'+tot_m+' hrs )');
		
		$('#week_total_time').val(tot_h+':'+tot_m);
	}
	else
	{
		$('#total_time_s').text('( 0 hrs )');
		$('#week_total_time').val(0);
	}
	  
}
	
	
	/*$('.task_name_inp').keypress(function(e) {
        console.log( 'JJJJJJJ' );
    });*/
	
	
	
	/*$('.task_name_inp').click(function(e) {
        console.log( 'PP' );
    });*/
	
	/*$('.task_name_inp').on("keyup",".x_content",function(){
		//$(this).parents('.each_task_bx').find(".task_head").contents();	
		console.log( 'PP' );
	});*/

});




/** ******  /scrollview  *********************** **/