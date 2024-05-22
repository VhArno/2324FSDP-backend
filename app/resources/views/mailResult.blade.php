<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="app.css">
        <title>Specialisatie keuzetest resultaat</title>
    </head>
    <body class="antialiased">
        <header>
            <div>
                <img src="https://ci3.googleusercontent.com/meips/ADKq_NbasVeuOFg-wW9KbExCcfk-mhJbbZY0M58Prq0vaVSH6R9-gKKl6E2lWGF6gUSm0ZqCoSjRf1tWg_lyiFQ9ZkBQVQKDV5aoNIfb2LJMFFHsgDbiOyeh2RfQQwPbUbQJSfxNUXd3HQ23qqL__1N0pI3cCiO_UtuNIM9NRdEC_kE9CdKr6QTLaZ1DUDYOotTduc639GkxwJThRTPvnbAcAHlBNQ=s0-d-e1-ft#https://registreer.odisee.be/public/files/profiles/profiles/61c076ed3b5d001d590001ea/files/banner_studiekeuzetest___2022_10_20_07_45_42.png" style="border:0;height:auto;line-height:100%;outline:none;text-decoration:none;border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px" width="584" height="auto" class="CToWUd" data-bit="iit">
            </div>
        </header>

        <main>       
            <section class="result">
                <h1>Dit is het resultaat van jouw studiekeuzetest</h1>
                @if($user->firstname != null)
                    <p>Hallo {{ $user->firstname }}</p>
                @endif
                <p>
                    <b>Bedankt voor je deelname aan onze studiekeuzetest.</b> Deze test is ontworpen door de studieadviesdienst van hogeschool 
                    Odisee, in samenwerking met alle opleidingen. Deze Odisee-opleidingen matchen het best bij jouw profiel:
                </p>
                <p>Resultaat: <b>{{ $specialisation->name }}</b></p>
                <p>
                    👉 <b>Ben je verrast, of helemaal niet?</b> Check zeker ook de andere opleidingen die aansluiten bij jouw interesses. Zo mis je 
                    geen enkele kans in je zoektocht naar een goede opleiding.
                </p>
            </section>

            <section class="meetup">
                <h3>Kom maar af 🙋‍♀️🙋‍♂️</h3>
                <ul>
                    <li>
                        Heb je nog vragen bij je resultaat of heb je gewoon nood aan een goeie babbel? Neem dan contact op met onze studieadviseurs, 
                        Inge of Leen, via <a href="studieadvies@odisee.be">studieadvies@odisee.be</a>
                    </li>
                    <li>
                        Of heb je zin om eens langs te komen? Dat kan natuurlijk ook. Je bent van harte welkom tijdens een van onze infomomenten. 
                        Surf naar <a href="www.odisee.be/welkom">www.odisee.be/welkom</a> voor de meest recente informatie.
                    </li>
                </ul>
            </section>
        </main>

        <footer>
            <section class="end">
                <h3>Veel succes nog met je studiekeuze!</h3>
                <p>Arno van het Odisee-communicatieteam</p>
            </section>
        </footer>
    </body>
</html>
