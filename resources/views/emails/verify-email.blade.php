<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirme seu e-mail — Auri Souza Personal</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f4f4f5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        table { border-collapse: collapse; width: 100%; }

        .wrapper {
            max-width: 560px;
            margin: 0 auto;
            padding: 24px 16px;
        }

        .card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
        }

        .hero {
            background: #0b0f19;
            padding: 48px 40px 40px;
            text-align: center;
        }

        .hero-brand {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 24px;
        }

        .hero-icon-wrap {
            width: 64px;
            height: 64px;
            background: rgba(0, 255, 127, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .hero-title {
            font-size: 32px;
            font-weight: 900;
            letter-spacing: -0.03em;
            text-transform: uppercase;
            color: #ffffff;
            line-height: 1.1;
            margin: 0 0 12px;
        }

        .hero-subtitle {
            font-size: 14px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
        }

        .body {
            background: #ffffff;
            padding: 40px;
        }

        .greeting {
            font-size: 18px;
            font-weight: 800;
            color: #0b0f19;
            margin: 0 0 16px;
        }

        .text {
            font-size: 15px;
            font-weight: 400;
            line-height: 1.7;
            color: #6b7280;
            margin: 0 0 24px;
        }

        .cta-wrap {
            text-align: center;
            margin: 32px 0;
        }

        .cta-button {
            display: inline-block;
            background: #00ff7f;
            color: #0b0f19;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.02em;
            text-decoration: none;
            padding: 18px 48px;
            border-radius: 9999px;
        }

        .divider {
            height: 1px;
            background: #f4f4f5;
            margin: 32px 0;
        }

        .alternative {
            font-size: 13px;
            font-weight: 400;
            line-height: 1.6;
            color: #9ca3af;
            margin: 0 0 8px;
        }

        .link-text {
            font-size: 12px;
            font-weight: 500;
            color: #9ca3af;
            word-break: break-all;
            text-align: center;
            display: block;
            margin: 8px 0 0;
            padding: 12px 16px;
            background: #f9fafb;
            border-radius: 12px;
            border: 1px solid #f3f4f6;
        }

        .footer {
            background: #0b0f19;
            padding: 32px 40px;
            text-align: center;
        }

        .footer-brand {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 8px;
        }

        .footer-text {
            font-size: 12px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.3);
            margin: 0;
        }

        .footer-links {
            margin-top: 16px;
        }

        .footer-links a {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
            margin: 0 8px;
        }

        .footer-links a:hover {
            color: #00ff7f;
        }

        @media (max-width: 480px) {
            .hero { padding: 32px 24px; }
            .hero-title { font-size: 24px; }
            .body { padding: 28px 24px; }
            .cta-button { padding: 16px 32px; font-size: 14px; }
            .footer { padding: 24px; }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            {{-- Hero --}}
            <div class="hero">
                <div class="hero-brand">Auri Souza Personal</div>
                <h1 class="hero-title">Viva mais<br>e melhor</h1>
                <p class="hero-subtitle">Sua jornada começa com a verificação do seu e-mail</p>
            </div>

            {{-- Corpo --}}
            <div class="body">
                <p class="greeting">Olá, {{ $first_name }}! 👋</p>

                <p class="text">
                    Que bom ter você com a gente! Para ativar sua conta e começar sua transformação, precisamos confirmar seu e-mail. Basta clicar no botão abaixo:
                </p>

                <div class="cta-wrap">
                    <a href="{{ $url }}" class="cta-button">
                        Confirmar meu e-mail
                    </a>
                </div>

                <div class="divider"></div>

                <p class="alternative">
                    Não conseguiu clicar no botão? Copie e cole o link abaixo no seu navegador:
                </p>
                <span class="link-text">{{ $url }}</span>

                <p class="alternative" style="margin-top: 24px;">
                    ⏱️ Este link expira em 60 minutos. Se expirar, você pode solicitar um novo na tela de verificação.
                </p>
            </div>

            {{-- Footer --}}
            <div class="footer">
                <div class="footer-brand">Auri Souza Personal</div>
                <p class="footer-text">© {{ date('Y') }} Auri Souza Personal. Todos os direitos reservados.</p>
                <div class="footer-links">
                    <a href="{{ config('app.url') }}/legal/privacyPolicy">Política de Privacidade</a>
                    <a href="{{ config('app.url') }}/legal/terms">Termos de Serviço</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>