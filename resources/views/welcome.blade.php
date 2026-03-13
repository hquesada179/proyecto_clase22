@extends('layouts.app')

@section('content')

<style>
    /* ── Hero ── */
    .hero {
        background: var(--dark);
        padding: 80px 20px 90px;
        text-align: center;
    }
    .hero__eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: var(--accent);
        background: rgba(6,182,212,.12);
        border: 1px solid rgba(6,182,212,.25);
        border-radius: 999px;
        padding: 5px 16px;
        margin-bottom: 22px;
    }
    .hero__title {
        font-size: clamp(32px, 5vw, 56px);
        font-weight: 900;
        color: #fff;
        line-height: 1.15;
        letter-spacing: -.5px;
        margin-bottom: 18px;
    }
    .hero__title span { color: var(--accent); }
    .hero__subtitle {
        font-size: 18px;
        color: rgba(255,255,255,.6);
        max-width: 540px;
        margin: 0 auto 36px;
        line-height: 1.65;
    }
    .hero__actions { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }

    /* ── Features ── */
    .features {
        padding: 72px 20px;
        background: var(--bg);
    }
    .section-title {
        text-align: center;
        font-size: 28px;
        font-weight: 900;
        color: var(--text);
        margin-bottom: 10px;
    }
    .section-sub {
        text-align: center;
        font-size: 15px;
        color: var(--muted);
        margin-bottom: 48px;
    }
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px;
        width: min(1100px, 100%);
        margin: 0 auto;
    }
    .feature-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px 24px;
        text-align: center;
        transition: transform .2s, box-shadow .2s;
    }
    .feature-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,.09);
    }
    .feature-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(37,99,235,.09);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        font-size: 24px;
    }
    .feature-card h3 {
        font-size: 16px;
        font-weight: 800;
        color: var(--text);
        margin-bottom: 8px;
    }
    .feature-card p {
        font-size: 14px;
        color: var(--muted);
        line-height: 1.6;
    }

    /* ── Categories ── */
    .categories {
        padding: 64px 20px;
        background: #fff;
    }
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 16px;
        width: min(1100px, 100%);
        margin: 0 auto;
    }
    .category-pill {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px 16px;
        text-align: center;
        text-decoration: none;
        color: var(--text);
        font-weight: 700;
        font-size: 14px;
        transition: .2s;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    .category-pill:hover {
        background: rgba(37,99,235,.07);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
    }
    .category-pill span:first-child { font-size: 26px; }

    /* ── CTA ── */
    .cta {
        background: var(--primary);
        padding: 72px 20px;
        text-align: center;
    }
    .cta h2 {
        font-size: 32px;
        font-weight: 900;
        color: #fff;
        margin-bottom: 14px;
    }
    .cta p {
        font-size: 16px;
        color: rgba(255,255,255,.75);
        margin-bottom: 36px;
        max-width: 460px;
        margin-left: auto;
        margin-right: auto;
    }
    .btn-white {
        background: #fff;
        color: var(--primary);
        border-color: #fff;
        font-weight: 800;
    }
    .btn-white:hover { background: #f0f4ff; transform: translateY(-2px); }

    /* ── Footer ── */
    .footer {
        background: var(--dark);
        padding: 32px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .footer__brand {
        color: #fff;
        font-size: 18px;
        font-weight: 900;
        text-decoration: none;
    }
    .footer__brand span { color: var(--accent); }
    .footer__copy {
        font-size: 13px;
        color: rgba(255,255,255,.4);
    }
</style>

{{-- ══ HERO ══ --}}
<section class="hero">
    <div class="hero__eyebrow">Tienda de electrónica en línea</div>
    <h1 class="hero__title">
        La tecnología que buscas,<br>
        <span>al mejor precio</span>
    </h1>
    <p class="hero__subtitle">
        Explora nuestro catálogo de productos electrónicos: smartphones, laptops, accesorios y más. Calidad garantizada con envío rápido.
    </p>
    <div class="hero__actions">
        <a href="{{ route('product.index') }}" class="btn btn-primary" style="font-size:15px; padding:13px 28px;">
            Ver productos
        </a>
        <a href="{{ route('product.create') }}" class="btn btn-outline" style="font-size:15px; padding:13px 28px;">
            Agregar producto
        </a>
    </div>
</section>

{{-- ══ BENEFICIOS ══ --}}
<section class="features">
    <h2 class="section-title">¿Por qué elegirnos?</h2>
    <p class="section-sub">Compramos con confianza en Electronictech</p>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🚚</div>
            <h3>Envío rápido</h3>
            <p>Despacho en 24–48 h a todo el país. Seguimiento en tiempo real de tu pedido.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🔒</div>
            <h3>Pago seguro</h3>
            <p>Transacciones cifradas. Aceptamos tarjetas, transferencia y pago contra entrega.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🛠️</div>
            <h3>Garantía oficial</h3>
            <p>Todos nuestros productos cuentan con garantía de fábrica y soporte posventa.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">💬</div>
            <h3>Soporte 24/7</h3>
            <p>Nuestro equipo está disponible para ayudarte antes y después de tu compra.</p>
        </div>
    </div>
</section>

{{-- ══ CATEGORÍAS DESTACADAS ══ --}}
<section class="categories">
    <h2 class="section-title">Categorías destacadas</h2>
    <p class="section-sub">Encuentra exactamente lo que necesitas</p>
    <div class="categories-grid">
        <a href="{{ route('product.index') }}" class="category-pill">
            <span>📱</span>
            <span>Smartphones</span>
        </a>
        <a href="{{ route('product.index') }}" class="category-pill">
            <span>💻</span>
            <span>Laptops</span>
        </a>
        <a href="{{ route('product.index') }}" class="category-pill">
            <span>🎧</span>
            <span>Audio</span>
        </a>
        <a href="{{ route('product.index') }}" class="category-pill">
            <span>📷</span>
            <span>Fotografía</span>
        </a>
        <a href="{{ route('product.index') }}" class="category-pill">
            <span>🖥️</span>
            <span>Monitores</span>
        </a>
        <a href="{{ route('product.index') }}" class="category-pill">
            <span>🔌</span>
            <span>Accesorios</span>
        </a>
    </div>
</section>

{{-- ══ LLAMADO A LA ACCIÓN ══ --}}
<section class="cta">
    <h2>¿Listo para explorar el catálogo?</h2>
    <p>Más de 200 productos disponibles. Nuevas llegadas cada semana.</p>
    <a href="{{ route('product.index') }}" class="btn btn-white" style="font-size:15px; padding:14px 32px;">
        Ir al catálogo completo
    </a>
</section>

{{-- ══ FOOTER ══ --}}
<footer class="footer">
    <a class="footer__brand" href="{{ url('/') }}">
        Electronic<span>tech</span>
    </a>
    <span class="footer__copy">&copy; {{ date('Y') }} Electronictech &mdash; Todos los derechos reservados</span>
</footer>

@endsection
