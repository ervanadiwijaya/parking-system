import React from 'react'
import ReactDOM from 'react-dom';
// import axios from 'axios'
import { BrowserQRCodeReader } from '@zxing/library';


export default function BarcodeScanner() {
    const codeReader = new BrowserQRCodeReader();
    // const firstDeviceId = '7fbede8ed222596c87a6c30d802910cf72eb95fd329debd659f8b24733569735';
    codeReader
        .decodeOnceFromVideoDevice(undefined, 'video')
        .then(result => console.log(result.text))
        .catch(err => console.error(err))

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