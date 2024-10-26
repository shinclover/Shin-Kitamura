const likeBtn = document.querySelector(".like-btn");
likeBtn.addEventListener("click", async (e) => {
    const clickedEl = e.target;
    clickedEl.classList.toggle("liked");

    const postId = e.target.id;

    const res = await /global fetch/("/like", {
        //リクエストメソッドはPOST
        method: "POST",
        headers: {
            //Content-Typeでサーバーに送るデータの種類を伝える。今回はapplication/json
            "Content-Type": "application/json",
            //csrfトークンを付与
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ post_id: postId }),
    })
        .then((res) => res.json())
        .then((data) => {
            clickedEl.nextElementSibling.innerHTML = data.likesCount;
        })
        .catch(() =>
            alert(
                "処理が失敗しました。画面を再読み込みし、通信環境の良い場所で再度お試しください。"
            )
        );
});

const favoriteBtns = document.querySelectorAll('.favorite-btn');

favoriteBtns.forEach(btn => {
    btn.addEventListener('click', async (e) => {
        const clickedEl = e.target;
        clickedEl.classList.toggle('favorited');
        const postId = clickedEl.id;

        // ボタンを無効化するなどのフィードバック
        clickedEl.style.pointerEvents = 'none';

        try {
             const res = await /global fetch/("/favorite", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            if (!res.ok) {
                clickedEl.classList.toggle('favorited'); // 状態を元に戻す
                throw new Error('お気に入りの切り替えに失敗しました。');
            }
            
            const data = await res.json();
            clickedEl.nextElementSibling.innerHTML = data.favoritesCount; // お気に入り数を更新
        } catch (error) {
            alert(error.message);
        } finally {
            clickedEl.style.pointerEvents = 'auto'; // ボタンを再び有効化
        }
    });
});
