<html style="text-align:center;">
<body style="text-align:center;">
    <table style="text-align:center; vertical-align:middle; margin-top:9%;" align="center">
            <tbody style="text-align:center;">
            @foreach ($codes as $code)
                <tr style="text-align:center;">
                    <td style="text-align:center;">
                        <h1>
                            <strong><span style="color: #ff0000; font-size:50px;">E-Book</span></strong>
                        </h1>
                        <br>
                        <h2>
                            <span style="color: #000000;">You May Download in English The Photo Book
                                Album Mobile.app</span>
                        </h2>
                        <br>
                        <p>
                            <span style="color: #000000;"><span style="color: #ff0000;"><img
                            src="{{ asset('assets/img/play_app_store.jpg') }}"
                                        alt="" /></span></span>
                        </p>
                        <br>
                        <h2>
                            <span style="color: #000000;">You May View it in Album English The Photo Book
                                app With Album Key&nbsp;</span>
                        </h2>
                        <p>&nbsp;</p>
                        <h3>
                            <span style="padding: 7px;"><h1>{{ explode('::', $code)[1] }}</h1></span>
                            <span style="color: #ffffff; background-color: #808080; padding: 7px; font-size:35px;">{{ explode('::', $code)[0] }}</span>
                        </h3>
                        <p>&nbsp;</p>
                        <p>
                            <span style="color: #000000; padding: 7px;"><img
                            src="{{ asset('assets/img/android_ios_app_link.png') }}"
                                    alt="" width="222" height="219" /></span>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
