import React from 'react'
import axios from 'axios'
import ReactDOM from 'react-dom';
// import axios from 'axios'
import { BrowserQRCodeReader } from '@zxing/library';


export default function BarcodeScanner() {
    const codeReader = new BrowserQRCodeReader();
    // const firstDeviceId = '7fbede8ed222596c87a6c30d802910cf72eb95fd329debd659f8b24733569735';

    function readBarcode() {
        codeReader
            .decodeOnceFromVideoDevice(undefined, 'video')
            .then(result => {
                // console.log(result.text)
                let alert = document.getElementById('alert_error');
                axios.post('/parkir/keluar/reader', {
                    kode_parkir: result.text
                }).then((response) => {

                    if (response.status === 201) {
                        alert = document.getElementById('alert_success_added')
                    }
                    alert.style.display = 'block'
                    setTimeout(() => {
                        alert.style.display = 'none'
                    }, 3000)
                    readBarcode()
                }).catch((error) => {
                    // console.log(error.response)
                    if (error.response.status === 409) {
                        alert = document.getElementById('alert_already_exist')
                    }
                    alert.style.display = 'block'
                    setTimeout(() => {
                        alert.style.display = 'none'
                    }, 3000)
                    readBarcode()
                })
            })
            .catch(err => console.error(err))
    }

    readBarcode()


    return (
        <div>
            <video
                id="video"
                width="300"
                height="200"
                style={{ border: '1px solid gray' }}
            >
            </video>
        </div>
    )
}

if (document.getElementById('BarcodeScanner')) {
    ReactDOM.render(<BarcodeScanner />, document.getElementById('BarcodeScanner'));
}