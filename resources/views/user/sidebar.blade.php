<div class="col-auto" style="background-color: white;">
    <div class="d-flex flex-column rating_section">
        <p>Rating</p>
        <ul class="rating_option">
            <li>
                <a class="five_star_wrapper">
                <x-show-all-star :rating_number=5 />

                </a>
            </li>
            <li>
                <a class="four_star_wrapper">
                    <x-show-all-star :rating_number=4 />
                </a>
            </li>
            <li>
                <a class="three_star_wrapper">
                    <x-show-all-star :rating_number=3 />
                </a>
            </li>
        </ul>
    </div>
    <hr style="margin: unset;" />
    <div class="d-flex flex-column price_range_section">
        <p>Price range</p>
        <span class="price_range_wrapper">
            <input class="price_range_input" placeholder="Min" /> - <input class="price_range_input" placeholder="Max" />
        </span>
    </div>
    <hr style="margin-bottom: 0;" />
    <div class="d-flex flex-column publishing_company_section">
        <p>Publishing Company</p>
        <span>
            <input type="checkbox" /> Usborne Publishing
        </span>
        <span>
            <input type="checkbox" /> MacMillan
        </span>
        <span>
            <input type="checkbox" /> Shueisha
        </span>
    </div>
    <hr style="margin-bottom: 0;" />
    <div class="d-flex flex-column author_section">
        <p>Author</p>
        <span>
            <input type="checkbox" /> DK
        </span>
        <span>
            <input type="checkbox" /> Brown Watson
        </span>
        <span>
            <input type="checkbox" /> Lake Press
        </span>
    </div>
    <hr style="margin-bottom: 0;" />
    <div class="d-flex flex-column cover_type_section">
        <p>Cover type</p>
        <span>
            <input type="checkbox" /> Softcover
        </span>
        <span>
            <input type="checkbox" /> Hardcover
        </span>
        <span>
            <input type="checkbox" /> Boxset
        </span>
    </div>
</div>