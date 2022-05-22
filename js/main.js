$(document).ready(function(){
		

      



    $('#linkform').submit(function(event){
      event.preventDefault();
      url = $('#linkform input[name=URL]').val();

      if( url.includes("bemate.co") ){
            
             $.ajax({
              type: "POST",
              url: 'services/downloader_api.php',
              data: {url:url },
                success: function(response){
                    response =response.replace(/\\n/g, '');
                   
                      eval(eval(response))
                      var title=Ab.state.articles.article.detail.title;
                      var thumbnil=Ab.state.articles.article.detail.thumbnail_url;
                      var VideoUrl=Ab.state.articles.article.detail.creative_url;
                        debugger;
                      $.ajax({
                          url:'services/Ojoo.php',
                          type:'POST',
                          data:{title:title,thumbnil:thumbnil,VideoUrl:VideoUrl},
                          success:function(data){
                            _doWithResponce(data);
                          },
                          error:function(){
                            _DoWithError();
                          }
                      })

                  } ,
                  error:function(){
                    _DoWithError();
                  }      
                });


      }

      else if( url.includes("zilivideo") ){
      	var z="+123";
      	var a={};
      		do{
      			a=GetZiliParams(url);      			
      			z=a.z;
      			
      		}
      		while( z.includes("+") );

      		
      		$.ajax({
      			url:'services/ziliDownload.php',
      			type:'POST',
      			data:{sign:a.sign,z:a.z,timestamp:a.timestamp},
      			success:function(response){
      				_doWithResponce(response);
      			},
            error:function(){
              _DoWithError();
            }
      		})

      }


      else if(url.trim() == "")
      	{ 
      		return;
      	}
      	else
      	{
      			 $.ajax({
      			  type: "POST",
      			  url: 'services/downloader_api.php',
      			  data: {url:url },
      				  success: function(response){
      		   				  if(response){ 
      		   				  	_doWithResponce(response);
      		                    }	
      						},
                  error:function(){
                    _DoWithError();
                  }		    
      					});

      	}


			
		});
	})