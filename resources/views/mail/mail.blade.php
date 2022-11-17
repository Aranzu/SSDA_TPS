

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
  <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
    <table role="presentation" style="width:100%;border:none;border-spacing:0;">
      <tr>
        <td align="center" style="padding:0;">
          <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
            <tr>
              <td style="padding:30px;background-color:#144578;">
                <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em; color:white;" align="center">Lista de trabajadores Sorteados</h1>
                <p style="margin:0;"></p>
              </td>
            </tr>
            <tr>
              <td style="padding:30px;background-color:#ffffff;">
                @php
                    $date_sent = date("d-m-Y");
                @endphp
                @if (isset($date_sent))
                <p style="color: black;">Junto con saludar, a continuación se muestran los trabajadores que han sido sorteados por el sistema SSTDA, a la fecha {{$date_sent}}.</p>
                @endif
                @if (isset($data))
                    <div align="center">
                        <table class="table" align="center">
                            <thead align="center">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Rut</th>
                                    <th scope="col">Nombre Completo</th>
                                    <th scope="col">Cargo</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @php
                                    $number=1;
                                @endphp
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{$number}}.</td>
                                        @php
                                            $number+=1;
                                        @endphp
                                        <td>{{$row[0]}}</td>
                                        <td>{{$row[1]}}</td>
                                        <td>{{$row[2]}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
              </td>
            </tr>
            <tr>
              <td style="padding:30px;text-align:center;font-size:12px;background-color:#144578;color:#cccccc;">
                <p style="margin:0 0 8px 0;"><a href="https://www.facebook.com/TPSValparaiso/" style="text-decoration:none;"><img src="https://assets.codepen.io/210284/facebook_1.png" width="40" height="40" alt="f" style="display:inline-block;color:#cccccc;"></a> <a href="https://twitter.com/TPS_Valparaiso" style="text-decoration:none;"><img src="https://assets.codepen.io/210284/twitter_1.png" width="40" height="40" alt="t" style="display:inline-block;color:#cccccc;"></a></p>
                <p style="margin:0;font-size:14px;line-height:20px;">&reg; Terminal Pacífico Sur Valparaíso - Chile, 2022<br><!--<a class="unsub" href="http://www.example.com/" style="color:#cccccc;text-decoration:underline;">Desinscribirse</a></p>-->
              </td>
            </tr>
          </table>

        </td>
      </tr>
    </table>
  </div>
</body>
</html>


