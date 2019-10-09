$(document).ready(function () {
    $('.sort-link').each(function() {
        $(this).on("click", function (e) {
            let sortBy = $(this).attr('id').replace('sort_',''),
                url = new URL(window.location.href),
                urlSortBy = url.searchParams.get('orderBy'),
                urlSortType = url.searchParams.get('type'),
                sortType = 'asc';
            
            url.pathname = '/task';

            if (sortBy === urlSortBy) {
                sortType = urlSortType === 'asc' ? 'desc': 'asc';
            }
            url.searchParams.set('orderBy',sortBy);
            url.searchParams.set('type',sortType);
            $(this).attr('href',url.toString());
        })
    });
});