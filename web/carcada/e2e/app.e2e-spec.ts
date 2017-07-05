import { CarcadaPage } from './app.po';

describe('carcada App', () => {
  let page: CarcadaPage;

  beforeEach(() => {
    page = new CarcadaPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
