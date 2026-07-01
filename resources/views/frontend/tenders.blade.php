

@extends('frontend.master')
@section('content')

<main id="mainContent">

  <section class="notice-page-hero tenders-hero">
    <div class="notice-hero-bg"></div>

    <div class="site-shell notice-hero-inner">
      <div class="notice-hero-content reveal">
        <span class="eyebrow">
          <i class="bi bi-file-earmark-text"></i>
          Tenders
        </span>

        <h1>Tender Notices & Documents</h1>

        <p>
          Access tender notices, official procurement documents, publish date,
          expire date, download files and view tender details.
        </p>

        <div class="hero-actions">
          <a href="#tenderList" class="btn primary">
            <i class="bi bi-table"></i>
            Tender List
          </a>
          <a href="{{ route('frontend.notice') }}" class="btn light">
            <i class="bi bi-megaphone"></i>
            Notices
          </a>
        </div>
      </div>

      <div class="notice-hero-card reveal delay-1">
        <div class="notice-card-icon">
          <i class="bi bi-file-earmark-ruled"></i>
        </div>
        <h3>Tenders</h3>
        <p>Public tender notice and official documents.</p>
      </div>
    </div>
  </section>

  <section class="notice-breadcrumb">
    <div class="site-shell breadcrumb-inner">
      <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> Home</a>
      <i class="bi bi-chevron-right"></i>
      <span>Notice</span>
      <i class="bi bi-chevron-right"></i>
      <strong>Tenders</strong>
    </div>
  </section>

  <section class="section notice-overview-section">
    <div class="site-shell two-col">
      <div class="image-panel reveal">
        <img src="assets/img/bdcpat_img_001.jpg" alt="B.D. College tenders">
      </div>

      <div class="content-block reveal delay-1">
        <span class="section-kicker">
          <i class="bi bi-file-earmark-text"></i>
          Tender Overview
        </span>

        <h2>Transparent tender and procurement information.</h2>

        <p>
          Tenders page can display public tender notices, downloadable documents,
          publish date, last date, view option and instructions for vendors.
        </p>

        <div class="check-grid">
          <span><i class="bi bi-check2-circle"></i> Tender notice</span>
          <span><i class="bi bi-check2-circle"></i> Tender document</span>
          <span><i class="bi bi-check2-circle"></i> Publish date</span>
          <span><i class="bi bi-check2-circle"></i> Expire date</span>
          <span><i class="bi bi-check2-circle"></i> Download PDF</span>
          <span><i class="bi bi-check2-circle"></i> View details</span>
        </div>
      </div>
    </div>
  </section>

  <section class="section notice-list-section" id="tenderList">
    <div class="site-shell">

      <div class="section-title reveal">
        <span class="section-kicker">
          <i class="bi bi-table"></i>
          Tender List
        </span>
        <h2>Latest tender notices.</h2>
      </div>

      <div class="notice-table-wrap reveal">
        <div class="notice-table-head">
          <div>
            <h3>Official Tender Board</h3>
            <p>Tender title, description, dates and documents.</p>
          </div>
        </div>

        <div class="notice-table-scroll">
         <table class="notice-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Heading</th>
            <th>Details</th>
            <th>Publish Date</th>
            <th>Expire Date</th>
            <th>Download</th>
            <th>View</th>
        </tr>
    </thead>

    <tbody>
        @forelse($tenderNotices as $index => $tender)
            @php
                $fileUrl = $tender->getFirstMediaUrl('tender_file');
                $isExpired = $tender->expire_date && $tender->expire_date->isPast();
            @endphp

            <tr>
                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>

                <td>{{ $tender->heading ?: '-' }}</td>

                <td>{{ $tender->details ?: '-' }}</td>

                <td>
                    <span class="notice-date">
                        {{ $tender->publish_date ? $tender->publish_date->format('d-m-Y') : 'To be updated' }}
                    </span>
                </td>

                <td>
                    <span class="notice-expire {{ $isExpired ? 'danger' : '' }}">
                        {{ $tender->expire_date ? $tender->expire_date->format('d-m-Y') : 'To be updated' }}
                    </span>
                </td>

                <td>
                    @if($fileUrl)
                        <a href="{{ $fileUrl }}"
                           download
                           class="notice-action download">
                            <i class="bi bi-download"></i>
                            Download
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    @if($fileUrl)
                        <button type="button"
                                class="notice-action view tender-view-btn"
                                data-file="{{ $fileUrl }}"
                                data-title="{{ e($tender->document_title ?: $tender->heading) }}"
                                data-subtitle="{{ e($tender->document_subtitle ?: 'Tender document') }}">
                            <i class="bi bi-eye"></i>
                            View
                        </button>
                    @else
                        <span>-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">
                    No tender notices available.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div>

      
      </div>

    </div>
  </section>

</main>

<div class="tender-document-modal" id="tenderDocumentModal" aria-hidden="true">
    <div class="tender-document-backdrop" data-tender-close></div>

    <div class="tender-document-dialog">
        <div class="tender-document-head">
            <div>
                <span>
                    <i class="bi bi-file-earmark-pdf"></i>
                    Tender Document
                </span>

                <h3 id="tenderDocumentTitle">Tender Document</h3>
                <p id="tenderDocumentSubtitle">Document preview</p>
            </div>

            <button type="button" class="tender-document-close" data-tender-close>
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="tender-document-body">
            <iframe id="tenderDocumentFrame"
                    src=""
                    title="Tender Document Preview"
                    loading="lazy"></iframe>
        </div>

        <div class="tender-document-footer">
            <a href="#"
               id="tenderDocumentDownload"
               download
               class="notice-action download">
                <i class="bi bi-download"></i>
                Download Document
            </a>

            <button type="button" class="notice-action view" data-tender-close>
                Close
            </button>
        </div>
    </div>
</div>

<style>
  .tender-document-modal {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.tender-document-modal.show {
    display: flex;
}

.tender-document-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(2, 6, 23, 0.72);
    backdrop-filter: blur(8px);
}

.tender-document-dialog {
    position: relative;
    z-index: 2;
    width: min(1040px, 96vw);
    height: min(760px, 92vh);
    background: #ffffff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 30px 90px rgba(15, 23, 42, 0.35);
    display: flex;
    flex-direction: column;
}

.tender-document-head {
    padding: 18px 22px;
    border-bottom: 1px solid rgba(148, 163, 184, 0.25);
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 18px;
}

.tender-document-head span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #b91c1c;
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.tender-document-head h3 {
    margin: 8px 0 4px;
    font-size: 22px;
    line-height: 1.25;
    color: #0f172a;
}

.tender-document-head p {
    margin: 0;
    color: #64748b;
    font-size: 14px;
}

.tender-document-close {
    width: 42px;
    height: 42px;
    border: 0;
    border-radius: 50%;
    background: #f1f5f9;
    color: #0f172a;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.tender-document-close:hover {
    background: #fee2e2;
    color: #b91c1c;
}

.tender-document-body {
    flex: 1;
    background: #f8fafc;
}

.tender-document-body iframe {
    width: 100%;
    height: 100%;
    border: 0;
    background: #ffffff;
}

.tender-document-footer {
    padding: 14px 18px;
    border-top: 1px solid rgba(148, 163, 184, 0.25);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    background: #ffffff;
}

.tender-view-btn {
    border: 0;
    cursor: pointer;
}

body.tender-modal-open {
    overflow: hidden;
}

@media (max-width: 768px) {
    .tender-document-dialog {
        width: 96vw;
        height: 88vh;
        border-radius: 18px;
    }

    .tender-document-head {
        padding: 15px;
    }

    .tender-document-head h3 {
        font-size: 18px;
    }

    .tender-document-footer {
        flex-direction: column;
        align-items: stretch;
    }

    .tender-document-footer .notice-action {
        justify-content: center;
    }
}
</style>

@section('scripts')
@parent
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('tenderDocumentModal');
    const frame = document.getElementById('tenderDocumentFrame');
    const title = document.getElementById('tenderDocumentTitle');
    const subtitle = document.getElementById('tenderDocumentSubtitle');
    const download = document.getElementById('tenderDocumentDownload');

    const openButtons = document.querySelectorAll('.tender-view-btn');
    const closeButtons = document.querySelectorAll('[data-tender-close]');

    function openTenderModal(fileUrl, documentTitle, documentSubtitle) {
        if (!fileUrl) return;

        title.textContent = documentTitle || 'Tender Document';
        subtitle.textContent = documentSubtitle || 'Document preview';

        frame.src = fileUrl;
        download.href = fileUrl;

        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('tender-modal-open');
    }

    function closeTenderModal() {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('tender-modal-open');

        setTimeout(function () {
            frame.src = '';
            download.href = '#';
        }, 200);
    }

    openButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            openTenderModal(
                button.getAttribute('data-file'),
                button.getAttribute('data-title'),
                button.getAttribute('data-subtitle')
            );
        });
    });

    closeButtons.forEach(function (button) {
        button.addEventListener('click', closeTenderModal);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && modal.classList.contains('show')) {
            closeTenderModal();
        }
    });
});
</script>
@endsection

@endsection