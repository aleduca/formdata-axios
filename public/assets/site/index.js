document
    .querySelector('#form')
    .addEventListener('submit', async function(event) {
        event.preventDefault();

        // const firstName = this.firstName.value;
        // const lastName = this.lastName.value;
        // const email = this.email.value;

        const file = this.file;

        const formData = new FormData(this);

        // console.log(formData.get('file'));

        try {
            const { data } = await axios.post('/upload', formData);

            if (data['uploaded']) {
                toastr.success(data['uploaded']);
            }
        } catch (error) {
            if (error.response.data['error']) {
                toastr.info(error.response.data['error']);
            }

            console.log(error.response.data);
        }
    });
