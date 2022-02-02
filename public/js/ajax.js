let AjaxRequest;
AjaxRequest = {
    get: (url, data) => {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                type: 'Get',
                data,
                success:(data) => {
                    resolve(data)
                },
                error:(e) => {
                    // console.log(${e.status}, ${e.statusText})
                    resolve(null)
                }
            })
        })
    }
};
