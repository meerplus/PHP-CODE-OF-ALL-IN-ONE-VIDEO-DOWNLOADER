
	
	$(document).ajaxStart(function () {
    	_StartLoading();
	});
	$(document).ajaxComplete(function () {
	  	_stopLoading();
	});


	function _StartLoading(){
		$('.loading').show();
         $('.result').hide();
	}
	function _stopLoading(){
		$('.loading').hide();
	}

	function _DoWithError(){
		$('.result').html(_GetErrorBox()).show();
		$('.loading').hide();
	}

	function _GetErrorBox(msg){
		if(msg == undefined ){
			msg="It seems like isssue with this service, You can click <a href='Javascript:void(0)' onClick='_Retry()'> here for retry</a> ";
		}

		return '<div class="alert alert-danger"><strong>Error!</strong> <br>'+ msg +'</div>';
	}

	function _Retry(){
		$('#linkform').submit();	
	}

	function _doWithResponce(response){

		try
		{



		var _data= JSON.parse(response);



				var _VideoResult=_data.VideoResult;
				var Strim="";				
				Strim +='<h3>Download Your Video 👇👇 </h3>' ;
				
				Strim +='<div class="row">';
				for(var i=0;i< _VideoResult.length;i++)
				{

					var title=_VideoResult[i].Title==null || _VideoResult[i].Title=="" ?_VideoResult[i].ServiceName:_VideoResult[i].Title;

					Strim+='<div  class="col-md-12">';
					Strim+='<div class="panel panel-primary">';
					Strim+='	<div class="panel-heading">';
					Strim+=title;
					
					Strim+='	</div>';
					Strim+='	<div class="panel-body" style="background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url(\''+_VideoResult[i].thumbnil+'\');background-size: cover;">';

					FileSize="";
						if(_VideoResult[i].FileSize !=null){
							FileSize=" <i>("+_VideoResult[i].FileSize+")</i>";
						}
						
					if(_VideoResult[i].VideoUrl !=null && _VideoResult[i].VideoUrl !="" ){
						Strim+='<video width="320" height="240" controls>';
						Strim+='<source src="'+_VideoResult[i].VideoUrl+'" type="video/mp4">';
						Strim+='<img src="'+_VideoResult[i].thumbnil +'" >';
						Strim+='</video><br>';


						if( _data.InternalDownload==false ){
							Strim+='<a download target="_blank"  style="max-width:320px" class="btn btn-primary form-control" href="'+_VideoResult[i].VideoUrl+'"> Download Video '+FileSize+'</a> <br><br>';
						}
						else
						{
							Strim+='<a target="_blank"   style="max-width:320px" class="btn btn-primary form-control" href="download.php?type=v&url='+ encodeURIComponent( _VideoResult[i].VideoUrl)+'&title='+title+'"> Download Video</a> <br><br>';
						}
					}
					if(_VideoResult[i].AudioUrl !=null)
					{
						Strim+='<audio src="'+_VideoResult[i].AudioUrl+'" controls></audio>';
						Strim+='<a download target="_blank" style="max-width:320px" class="btn btn-primary form-control" href="'+_VideoResult[i].AudioUrl+'"> Download Audio '+ FileSize +'</a> <br><br>';
					}
					if( (_VideoResult[i].VideoUrl ==null || _VideoResult[i].VideoUrl ==""  ) && (_VideoResult[i].AudioUrl ==null || _VideoResult[i].AudioUrl !="" )  ){
						Strim +=_GetErrorBox()	;
					}
					
					Strim+='</div>';
					Strim+='</div>';
					Strim+='</div>';
				}
				Strim+='</div>Right-Click on video and click "save video as.."';
				$('.result').html(Strim).show();
				//$('.loading').hide();
				}
		catch(err)
		{
			_DoWithError();;
		}
	}
	