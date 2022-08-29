$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/getUsers',
        dom: "<'row'<'col-sm-12 col-md-6'<'pull-left'l>><'col-sm-12 col-md-6'<'pull-right'f>>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'<'pull-right'p>>>",
        columns: [
            
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            {   
                "data":"id",
                "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'left');
                    $(nTd).css('width', '15%');
                },
                "mRender": function( data, type, full ,meta) {
                    return `<a href="/user/${full.id}/view-contacts" class="btn btn-info text-white btn-sm">View contacts </a>`;
                }
            },
        ]
    });
});