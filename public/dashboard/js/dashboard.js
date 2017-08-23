$(document).ready(function() {
    window.OPTS = $.extend(true, {
        datatable: {
            config: {
                stateSave: true,
                processing: true,
                order: [[0, "asc"]],
                ajax: {type: "GET", url: OPTS.links.list},
                lengthMenu: [[20, 50, 100, -1], [20, 50, 100, _("All")]],
                dom: '<"row"<"col-lg-3"B><"col-lg-3"r><"col-lg-6"f>>t<"row"<"col-lg-3 text-left"l><"col-lg-6 text-right"i><"col-lg-3 text-center"p>>',
                columnDefs: [
                    {
                        data        : "doc.index",
                        className   : "row-index text-center",
                        targets     : 0
                    },
                    {
                        data: "doc.condition",
                        className: "text-center",
                        targets: -3,
                        render: function (data, type, row) {
                            return $("<p>").addClass('label label-success label-' + data.id)
                                .text(_(data.name)).wrap("<div>")
                                .parent().html();
                        }
                    },
                    {
                        data: "doc.updated",
                        className: "text-center",
                        targets     : -2
                    },
                    {
                        data        : "doc.id",
                        className   : "actions text-center",
                        orderable   : false,
                        targets     : -1,
                        render      : function (data, type, row) {
                            var attr = !data ? {href: '#', 'data-toggle': 'modal', 'data-target': "#exampleModal", "data-doc": JSON.stringify(row)}
                                 : {href: location.path + "edit/" + data};

                            return $("<div>").css('min-width', "100px").append(
                                $("<a>").addClass('btn btn-sm btn-info').attr(attr).append($("<i>").addClass("fa fa-edit")),
                                $("<a>").addClass('btn btn-sm btn-danger').attr('href', data ? location.href + "remove/" + data : '#')
                                    .append($("<i>").addClass("fa fa-trash-o"))
                            ).wrap("<div>").parent().html();
                        }
                    }
                ],
                rowReorder: {
                    dataSrc: "doc.index",
                    selector: "td:first-child",
                    update: true,
                    snapX: true
                },
                language: {
                    infoFiltered: "",
                    zeroRecords: "Nothing found - sorry",
                    info: "Showing _START_ to _END_ of _TOTAL_",
                    lengthMenu: "Show _MENU_ entries",
                    infoEmpty: ""
                },
                select: {
                    style: 'multi',
                    selector: '.select-box'
                },
                JUI: true
            }
        }
    }, window.OPTS||{});


    OPTS.datatable.config.buttons.push({
        className: 'btn',
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        extend: 'collection',
        text: 'Export'
    });

    /* ---------- Datable ---------- */
    var dt = $( ".datatable" ).DataTable(OPTS.datatable.config);

    // sorting
    dt.on('row-reorder', function (e, changes, data) {
        if (!$.isEmptyObject(data.values)) {
            $.post(OPTS.links.sort, data.values);
        }
    });

    // processing
    dt.on('processing.dt', function (e, settings, processing) {
        $('.dataTables_processing', $(this))
            .fadeTo(Number(processing));
    });

    // order and search
    dt.on('order.dt search.dt', function () {
        dt.column(0, {search: 'applied', order: 'applied'}).nodes()
            .each(function(cell, i) {
                $(cell).empty().append(
                    $("<span>").addClass('idx').text(i+1),
                    $("<a>").addClass('btn btn-sm hidden').append(
                        $("<i>").addClass("fa fa-sort")
                    )
                );
            });
    });

    if (OPTS.datatable.config.rowReorder !== null) {
        dt.on('hover', 'tr', function (e) {
            $('td.row-index > *', e.currentTarget)
                .toggleClass('hidden');
        });
    }

    $('.datatable tbody').on('click', 'a.btn-sm.btn-danger', function (ev) {
        var link = $(this);
        $.post(link.attr('href'), function() {
            dt.row(link.parents('tr'))
                .remove()
                .draw();
        });

        ev.stopPropagation();
        return false;
    } );
});