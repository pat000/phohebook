let pages = 2;
let current_page = 1;
let bool = false;
let lastPage ;

$(window).scroll(function (){
  let  height = $(document).height();
   if($(window).scrollTop() + $(window).height() >= height && bool == false && lastPage > pages){
    bool = true;
    $('.ajax-load').show();
    
    lazyLoad(pages)
    .then(() => {
      bool = false;
      pages++;
      if(pages - 2 == lastPage){
        $('.no-data').show();
      }
   })
  }
})


function lazyLoad(page){
  return new Promise((resolve,reject) => {
        $.ajax({
                url: '?page='+page,
                type:'GET',
                beforeSend:function() {
                $('.ajax-load').show();
              }, 
              success :function (response){
                $('.ajax-load').hide();
                let html = '';
                for(let i = 0; i < response.data.data.length;i++){
                  html += `
                    <div class="col-md-4 mb-3" >
                              <div class="card">
                                <div class="card-header">
                                  Phone Card
                                </div>
                                <div class="card-body">
                                  <table class="table">
                                    <tr>
                                    <th>Name</th>
                                    <td>:</td>
                                    <td>`+response.data.data[i].name+`</td>
                                </tr>
                              <tr>
                                  <th>Phone</th>
                                    <td>:</td>
                                    <td>`+response.data.data[i].phone_number+`</td>
                                </tr>
                                <tr>
                                  <th>Email</th>
                                    <td>:</td>
                                    <td>`+response.data.data[i].email+`</td>
                                </tr>
                          </table>
                        </div>
                      </div>
                  </div>
          `;
          }
          $('#data_temp').append(html);
            resolve();
          }
      });
  })
}

loadData(1);



function loadData(page){
    $.ajax({
       url: '?page='+page,
       type:'GET',
       beforeSend:function() {
         $('.ajax-load').show();
       },
       success :function (response){
           $('.ajax-load').hide();
           lastPage = response.data.last_page;
           console.log(response);
          let html = '';
        for(let i = 0; i < response.data.data.length;i++){
            html += `
              <div class="col-md-4 mb-3" >
                <div class="card">
                    <div class="card-header">
                    Phone Card
                    </div>
                <div class="card-body">
                      <table class="table">
                        <tr>
                            <th>Name</th>
                              <td>:</td>
                              <td>`+response.data.data[i].name+`</td>
                          </tr>
                          <tr>
                            <th>Phone</th>
                              <td>:</td>
                            <td>`+response.data.data[i].phone_number+`</td>
                          </tr>
                          <tr>
                            <th>Email</th>
                              <td>:</td>
                            <td>`+response.data.data[i].email+`</td>
                           </tr>
                      </table>
                  </div>
                  </div>
              </div>`;
      }
      $('#data_temp').html(html);
   }
  });
}
