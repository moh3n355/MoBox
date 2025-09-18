<!doctype html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ارسال تیکت — پشتیبانی</title>
  <style>
    :root{
      --bg:#f6f7fb;--card:#fff;--accent:#4f46e5;--accent2:#3b82f6;--muted:#6b7280;
      --status-unread:#fee2e2;--status-review:#fef9c3;--status-open:#dcfce7;
    }
    *{box-sizing:border-box}
    body{font-family: Vazirmatn, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; background:var(--bg); margin:0; padding:20px; color:#111}
    .container{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:380px 1fr;gap:20px}
    .card{background:var(--card);border-radius:16px;padding:20px;box-shadow:0 6px 18px rgba(16,24,40,0.06);transition:all .3s ease}
    .card:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(16,24,40,0.1)}
    h2{margin:0 0 16px 0;font-size:20px;color:#1e1e1e}

    /* form */
    label{display:block;margin-bottom:6px;font-size:13px;color:var(--muted)}
    input[type=text], select, textarea{width:100%;padding:12px;border:1px solid #e6e9ef;border-radius:10px;font-size:14px;transition:border .2s ease}
    input[type=text]:focus, select:focus, textarea:focus{outline:none;border-color:var(--accent)}
    textarea{min-height:120px;resize:vertical}
    .row{display:flex;gap:10px}
    .btn{display:inline-block;padding:10px 18px;border-radius:10px;border:0;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;cursor:pointer;font-weight:500;transition:all .3s ease}
    .btn:hover{opacity:0.9;transform:translateY(-1px)}
    .btn.ghost{background:transparent;color:var(--accent);border:1px solid rgba(79,70,229,0.3)}

    /* tickets list */
    .ticket-list{display:flex;flex-direction:column;gap:12px;max-height:70vh;overflow:auto;padding-right:4px}
    .ticket-item{display:flex;justify-content:space-between;align-items:center;padding:14px;border-radius:12px;cursor:pointer;border:1px solid transparent;background:#fafafa;transition:all .25s ease}
    .ticket-item.unread{background:linear-gradient(90deg, rgba(79,70,229,0.06), transparent)}
    .ticket-item:hover{border-color:#c7d2fe;transform:translateY(-2px)}
    .meta{font-size:12px;color:var(--muted)}
    .badge{font-size:12px;padding:4px 10px;border-radius:999px;background:#f1f5f9}

    /* ticket view */
    .ticket-view{display:flex;flex-direction:column;gap:14px}
    .message{background:#fbfbff;padding:14px;border-radius:12px;border:1px solid #eef2ff}
    .status-line{display:flex;gap:8px;align-items:center;margin-top:6px}
    .status{font-size:13px;padding:6px 12px;border-radius:999px;font-weight:500}
    .status.unread{background:var(--status-unread);color:#991b1b}
    .status.review{background:var(--status-review);color:#92400e}
    .status.open{background:var(--status-open);color:#065f46}

    /* small */
    .small{font-size:13px;color:var(--muted)}
    .muted{color:var(--muted)}

    @media (max-width:900px){.container{grid-template-columns:1fr}.ticket-list{max-height:36vh}}
  </style>
</head>
<body>
  <div class="container">
    <!-- sidebar: create ticket + list -->
    <div>
      <div class="card">
        <h2>ارسال تیکت جدید</h2>
        <form id="ticketForm">
          <label for="topic">موضوع</label>
          <input id="topic" name="topic" type="text" placeholder="مثال: مشکل در پرداخت" required />

          <label for="category">دسته‌بندی</label>
          <select id="category" name="category">
            <option value="عمومی">عمومی</option>
            <option value="پرداخت">پرداخت</option>
            <option value="تکنیکی">تکنیکی</option>
            <option value="حساب کاربری">حساب کاربری</option>
          </select>

          <label for="description">توضیحات</label>
          <textarea id="description" name="description" placeholder="توضیحات کامل مشکل..." required></textarea>

          <div style="margin-top:12px;display:flex;gap:10px">
            <button class="btn" type="submit">ارسال تیکت</button>
            <button class="btn ghost" type="button" id="clearForm">پاک کردن</button>
          </div>
        </form>
      </div>

      <div class="card" style="margin-top:16px">
        <h2>تیکت‌ها</h2>
        <div class="small muted" style="margin-bottom:8px">برای مشاهده جزئیات یک تیکت روی آن کلیک کنید</div>
        <div class="ticket-list" id="ticketList"></div>
      </div>
    </div>

    <!-- main: ticket view -->
    <div>
      <div class="card ticket-view" id="ticketViewContainer">
        <div id="emptyState">
          <h2>تیکتی انتخاب نشده</h2>
          <div class="muted">برای دیدن جزئیات یک تیکت، آن را از ستون سمت چپ انتخاب کنید.</div>
        </div>

        <!-- detailed ticket area (rendered dynamically) -->
        <div id="ticketDetail" style="display:none">
          <!-- header -->
          <div style="display:flex;justify-content:space-between;align-items:center">
            <div>
              <div style="font-weight:700;font-size:18px;margin-bottom:4px" id="detailTopic"></div>
              <div class="meta" id="detailMeta"></div>
            </div>
            <div class="status-line">
              <div id="statusLabel" class="status"></div>
            </div>
          </div>

          <!-- messages (only description) -->
          <div id="messages" style="display:flex;flex-direction:column;gap:10px;margin-top:12px"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const LS_KEY = 'my_tickets_v1';

    function uid(){return 't_'+Math.random().toString(36).slice(2,9)}
    function loadTickets(){try{const s=localStorage.getItem(LS_KEY);return s?JSON.parse(s):[]}catch(e){return[]}}
    function saveTickets(t){localStorage.setItem(LS_KEY,JSON.stringify(t))}

    function renderList(){
      const listEl = document.getElementById('ticketList');
      const tickets = loadTickets().sort((a,b)=> new Date(b.createdAt)-new Date(a.createdAt));
      listEl.innerHTML = '';
      if(tickets.length===0){listEl.innerHTML = '<div class="muted">تیکتی ارسال نشده</div>';return}
      tickets.forEach(t=>{
        const item = document.createElement('div');
        item.className = 'ticket-item ' + (t.status==='unread'?'unread':'');
        item.dataset.id = t.id;
        item.innerHTML = `
          <div style="flex:1">
            <div style="font-weight:600;display:flex;align-items:center;gap:6px">🎫 ${escapeHtml(t.topic)}</div>
            <div class="meta">${t.category} · ${new Date(t.createdAt).toLocaleString('fa-IR')}</div>
          </div>
          <div class="badge">${t.status}</div>
        `;
        item.addEventListener('click',()=> openTicket(t.id));
        listEl.appendChild(item);
      })
    }

    function openTicket(id){
      const tickets = loadTickets();
      const t = tickets.find(x=>x.id===id);
      if(!t) return;
      document.getElementById('emptyState').style.display='none';
      const detail = document.getElementById('ticketDetail'); detail.style.display='block';
      document.getElementById('detailTopic').textContent = t.topic;
      document.getElementById('detailMeta').textContent = `${t.category} · ایجاد شده: ${new Date(t.createdAt).toLocaleString('fa-IR')}`;
      document.getElementById('statusLabel').textContent = t.status;
      document.getElementById('statusLabel').className = 'status ' + (t.status==='unread'? 'unread' : (t.status==='review'? 'review':'open'));

      renderMessages(t);
    }

    function renderMessages(ticket){
      const container = document.getElementById('messages'); container.innerHTML='';
      const orig = document.createElement('div'); orig.className='message';
      orig.innerHTML = `<div style="font-weight:600">درخواست ارسال شده</div><div class="small muted">${new Date(ticket.createdAt).toLocaleString('fa-IR')}</div><div style="margin-top:8px">${escapeHtml(ticket.description)}</div>`;
      container.appendChild(orig);
    }

    document.getElementById('ticketForm').addEventListener('submit', e=>{
      e.preventDefault();
      const topic = document.getElementById('topic').value.trim();
      const category = document.getElementById('category').value;
      const description = document.getElementById('description').value.trim();
      if(!topic||!description) return alert('لطفا موضوع و توضیحات را پر کنید');
      const tickets = loadTickets();
      const t = { id: uid(), topic, category, description, status:'unread', createdAt:new Date().toISOString(), messages:[] };
      tickets.push(t); saveTickets(tickets); renderList();
      openTicket(t.id);
      document.getElementById('ticketForm').reset();
    })

    document.getElementById('clearForm').addEventListener('click',()=>document.getElementById('ticketForm').reset())

    function escapeHtml(s){return s.replaceAll('&','&amp;').replaceAll('<','&lt;').replaceAll('>','&gt;')}

    renderList();
  </script>
</body>
</html>